<?php

namespace App\Http\Controllers\User;

use App\Model\User\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        $data['posts']=Post::where('status',1)->get();
        return view('user.blog',$data);
    }
}
