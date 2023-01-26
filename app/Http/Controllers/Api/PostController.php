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
}
