<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::with(['tags','category','user'])->orderBy('id','desc')->paginate(10);
        $categories = Category::all();
        $tags = Tag::all();
        return response()->json(compact('posts','categories', 'tags'));
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

        $tosearch = $_GET['tosearch'];

        $posts = Post::where('title','like',"%$tosearch%")->with(['tags','category','user'])->get();

        return response()->json($posts);
    }

    public function getByCategory($id){

        $posts = Post::where('category_id',$id)->with(['tags','category','user'])->get();

        return response()->json($posts);

    }

    public function getByTag($id){

        $list_posts = [];
        $tag = Tag::where('id',$id)->with(['posts'])->first();
        foreach($tag->posts as $post){
            $list_posts[] = Post::where('id',$post->id)->with(['tags','category','user'])->first();
        }

        return response()->json($list_posts);

    }

}
