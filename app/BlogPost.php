<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $guarded = ['id'];
    public $table = "blog_post";
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}
