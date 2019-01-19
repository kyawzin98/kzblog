<?php

namespace App\Http\Controllers\User;

use App\Model\User\Like;
use App\Model\User\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function post(Post $slug){
        $data['post']=$slug;
        return view('user.post',$data );
    }

    public function getAllPosts(){
       return $data['posts']=Post::with('likes')->where('status',1)->orderBy('created_at','DESC')->paginate(5);
    }

    public function saveLike(Request $request){
        $likeCheck = Like::where(['user_id'=>Auth::id(),'post_id'=>$request->id])->first();
        if ($likeCheck){
            Like::where(['user_id'=>Auth::id(),'post_id'=>$request->id])->delete();
            return 'deleted';
        }else{
            $like = new Like();
            $like->user_id = Auth::id();
            $like->post_id = $request->id;
            $like->save();
        }
    }
}
