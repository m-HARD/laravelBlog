<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user_posts;

class PageController extends Controller
{
    public function get_single($slug){
        $post = user_posts::where('slug', $slug)->first();
        return view('user_views.blog.single_post')->withPost($post);
    }
}
