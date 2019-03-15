<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class like extends Model
{
    public function post()
    {
        return $this->belongsTo('App\user_posts', 'post_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

}
