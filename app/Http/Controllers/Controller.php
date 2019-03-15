<?php

namespace App\Http\Controllers;
use App\user_posts;
use App\like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ShowAllPosts()
    {
        $posts = user_posts::orderby('id','desc')->paginate(10);
        return view('user_views.posts.ShowAllPosts')->with(['posts'=>$posts]);
    }

    public function like_post($id)
    {
        $r = false;
        $postr = like::where('user_id', auth::user()->id)->get();
        foreach ($postr as $like) {
           if ($like->post_id == $id) {
               $r = true;
               if ($like->post_status == false) {
                $like->post_status = true;
                $like->save();
                return redirect()->route('userAllPost');
               }
               if ($like->post_status == true) {
                $like->post_status = false;
                $like->save();
                return redirect()->route('userAllPost');
               }
           }
        }

        if($r==false){
            $post_like = new like;
            $post_like->post_id = $id;
            $post_like->user_id = auth::user()->id;
            $post_like->user_name = auth::user()->name;
            $post_like->post_status = true;
            $post_like->save();
            return redirect()->route('userAllPost');
        }


        
       
       

        return redirect()->route('userAllPost');
    }

}
