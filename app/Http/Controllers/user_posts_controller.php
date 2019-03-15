<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\user_posts;
use App\Category;
use App\Tag;
use Session;
use Purifier;

class user_posts_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = user_posts::where('user_id', auth::user()->id)->orderby('id','desc')->paginate(10);
        return view('user_views.posts.index')->withPosts($posts);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $cats = array();
        foreach ($categories as $category) {
            $cats[$category->id] = $category->name;
        }

        $tags = Tag::all();
        $tag2 = array();
        foreach ($tags as $tag) {
            $tag2[$tag->id] = $tag->name;
        }
        return view('user_views.posts.create')->withCategories($cats)->withTags($tag2);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //validate
        $this->validate($request,array(
            'title' => 'required|max:255',
            'slug' => 'required|alpha_dash|max:255|min:5|unique:user_posts,slug',
            'category_id' => 'required|integer',
            'body' => 'required'
        ));

        //store
        $post = new user_posts;
        $post->user_id = auth::user()->id;
        $post->writer = auth::user()->name;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body = Purifier::clean($request->body);
        $post->save();
        
        $post->tags()->sync($request->tags,false);
        //Session
        Session::flash('success' , 'The Plog Post Was successfully save');
        
        //view
        return redirect()->route('posts.index' , $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = user_posts::find($id);
        return view('user_views.posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = user_posts::find($id);

        $categories = Category::all();
        $cats = array();
        foreach ($categories as $category) {
            $cats[$category->id] = $category->name;
        }

        $tags = Tag::all();
        $tag2 = array();
        foreach ($tags as $tag) {
            $tag2[$tag->id] = $tag->name;
        }
        return view('user_views.posts.edit')->withPost($post)->withCategories($cats)->withTags($tag2);
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
        
        $post = user_posts::find($id);
        if ($request->input('slug') == $post->slug) {
            $this->validate($request,array(
                'title' => 'required|max:255',
                'category_id' => 'required|integer',
                'body' => 'required'
            ));
        }else {
            $this->validate($request,array(
                'title' => 'required|max:255',
                'slug' => 'required|alpha_dash|max:255|min:5|unique:user_posts,slug',
                'category_id' => 'required|integer',
                'body' => 'required'
            ));
        }
        $post = user_posts::find($id);
        $post->writer = auth::user()->name;
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category_id');
        $post->body = Purifier::clean($request->input('body'));
        $post->save();

        
        $post->tags()->sync($request->tags);

        Session::flash('success' , "The Post Is Successfully Saved!");
        
        return redirect()->route('posts.show' , $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = user_posts::find($id);
        $post->tags()->detach();
        
        $post->delete();
        $post->save;

        Session::flash('success' , "The Post Is Successfully Deleted!");
        return redirect()->route('posts.index');
    }
}
