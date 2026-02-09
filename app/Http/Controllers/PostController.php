<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    // method index posts
    public function index()
    {
        return view('posts', [
            "title"=>"All Posts",
            // "posts"=>Post::all()
            "posts"=>Post::latest()->get()
        ]);
    }

    // method show per-satu posts
    public function show(Post $post)
    {
        return view('post', [
            "title"=>"Single Post",
            "post"=>$post
        ]);
    }
}
