<?php

namespace App\Http\Controllers\User;

use App\Model\User\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function post(Post $slug){
        $data['post']=$slug;
        return view('user.post',$data );
    }
}
