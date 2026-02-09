<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Models\Category;
use Termwind\Components\Raw;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Halaman index nya ==> ketika pertama kali dibuka
Route::get('/', function () {
    return view('home', [
        "title"=>"Home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title"=>"About",
        "name"=>"Farel Ferdyawan",
        "email"=>"ferdy.transafe@gmail.com",
        "image"=>"ferdybatik.jpeg"
    ]); 
});

// Halaman Banyak Post ==> index post nya
Route::get('/posts', [PostController::class, 'index']);

// Halaman Single Post ==> satu per-satu post nya
Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function() {
    return view('categories', [
        'title' => 'Post Categories',
        'categories' => Category::all()
    ]);
});

Route::get('/categories/{category:slug}', function(Category $category) {
    return view('posts', [
        'title' => "Post By Category : $category->name",
        'posts' => $category->posts->load('category', 'author'),
    ]);
});

Route::get('/authors/{author:username}', function(User $author) {
    return view('posts', [
        'title' => "Post By Author : $author->name",
        'posts' => $author->posts->load('category', 'author'),
    ]);
});
