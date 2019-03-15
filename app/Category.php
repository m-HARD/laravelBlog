<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function user_posts()
    {
        return $this->hasMany('App\user_posts');
    }
}
