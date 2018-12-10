<?php

namespace App\Http\Controllers\User;

use App\Model\User\Category;
use App\Model\User\Post;
use App\Model\User\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        $data['posts']=Post::where('status',1)->orderBy('created_at','DESC')->paginate(5);
        return view('user.blog',$data);
    }

    public function tag(Tag $tag){
        $data['posts']= $tag->posts();
        return view('user.blog',$data);
    }
    public function category(Category $category){
        $data['posts']= $category->posts();
        return view('user.blog',$data);

    }
}
