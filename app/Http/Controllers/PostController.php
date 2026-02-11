<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class PostController extends Controller
{
    // method index posts
    public function index()
    {
        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            // dd(author);

            $author = $author;

            $title = ' by ' . $author->name;
        }

        return view('posts', [
            'title' => 'All Posts' . $title,
            'active' => 'posts',
            'posts' => Post::latest()
                ->filter(request(['search', 'category', 'author']))
                ->paginate(7)
                ->withQueryString(),
        ]);
    }

    // method show per-satu posts
    public function show(Post $post)
    {
        return view('post', [
            'title' => 'Single Post',
            'active' => 'posts',
            'post' => $post,
        ]);
    }
}
