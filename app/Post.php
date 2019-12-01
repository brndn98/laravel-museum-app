<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'description', 'file', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function commenters()
    {
        return $this->belongsToMany('App\User', 'comments')->withPivot('text');
    }

    public function liked()
    {
        return $this->belongsToMany('App\User', 'like_post', 'post_id', 'user_id');
    }
}
