<?php

namespace App\Model\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=['title','subtitle','slug','body','status','posted_by','image','like','dislike'];

    public function  tags(){
        return $this->belongsToMany('App\Model\User\Tag','tag_posts')->withTimestamps();
    }

    public function categories(){
        return $this->belongsToMany('App\Model\User\Category','category_posts')->withTimestamps();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
