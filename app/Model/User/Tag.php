<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable=['name','slug'];

    public function posts(){
        return $this->belongsToMany('App\Model\User\Post','tag_posts');
    }
}
