<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function posts(){
        return $this->belongsToMany('App\user_posts','posts_tags','tag_id','post_id');
    }
}
