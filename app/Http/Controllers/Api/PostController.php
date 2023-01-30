<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::with(['tags','category','user'])->orderBy('id','desc')->paginate(10);
        return response()->json(compact('posts'));
    }

    public function show($slug){

        $post = Post::where('slug',$slug)->with(['tags','category','user'])->first();

        if($post->image){
            $post->image = url("storage/" . $post->image);
        }else{
            $post->image = url("storage/uploads/image-paceholder.jpg");
        }

        return response()->json($post);

    }

    public function search(){
        $tosearch = $_POST['tosearch'];

        $posts = Post::where('title','like',"%$tosearch%")->with(['tags','category','user'])->paginate(10);

        return response()->json(compact('posts'));
    }

}
