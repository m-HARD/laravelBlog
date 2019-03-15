<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_posts extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag','posts_tags','post_id','tag_id');
    }

    
    public function comments()
    {
        return $this->hasMany('App\comment','post_id','id');
    }
    
    
    public function likes()
    {
        return $this->hasMany('App\like', 'post_id', 'id');
    }
    
}
