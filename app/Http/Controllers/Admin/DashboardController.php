<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){

        $count_post = Post::where('user_id', Auth::id())->count();

        return view('admin.home', compact('count_post'));
    }
}
