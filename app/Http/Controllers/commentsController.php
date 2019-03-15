<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\user_posts;
use App\comment;
use Session;

class commentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , $post_id)
    {
        $this->validate($request ,[
            'name'      =>  'required|max:255',
            'email'     =>  'required|email|max:255',
            'comment'   =>  'required|min:5'
        ]);

        $post = user_posts::find($post_id);
        $comment = new comment();
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->approved = true;
        $comment->post()->associate($post);
        $comment->user()->associate(auth::user());
        $comment->save();

        $request->session()->flash('success' , 'The comment Was successfully added');

        return redirect()->route('blog.single',$post->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = comment::find($id);
        return view('user_views.comments.edit')->withComment($comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comment = comment::find($id);

        $this->validate($request,array(
            'comment' => 'required|min:5'
        ));
    
        $comment->comment = $request->input('comment');
        $comment->save();

        Session::flash('success' , "The Comment Is Successfully Chenged!");
        
        return redirect()->route('posts.show' , $comment->post->id);
    }

    public function delete($id)
    {
        $comment = comment::find($id);
        return view('user_views.comments.delete')->withComment($comment);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id )
    {
        
        $comment = comment::find($id);
        $post_id = $comment->post->id;
        $comment->delete();

        Session::flash('success' , "The Comment Is Successfully Deleted!");

        return redirect()->route('posts.show',$post_id);
    }
}
