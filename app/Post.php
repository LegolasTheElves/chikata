<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //function that identify which post is belong to user or the relation of two table
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function likes(){
        return $this->hasMany('App\Like');
    }
}
