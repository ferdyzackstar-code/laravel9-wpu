<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;

use App\Http\Controllers\DashboardProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Termwind\Components\Raw;

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
Route::get('/', [HomeController::class, 'index']);

// HALAMAN ABOUT
Route::get('/about', function () {
    return view('about', [
        'title' => 'About',
        'active' => 'about',
        'name' => 'Farel Ferdyawan',
        'email' => 'ferdy.transafe@gmail.com',
        'image' => 'ferdybatik.jpeg',
    ]);
})->name('about.index');

// Halaman Banyak Post ==> index post nya
Route::get('/posts', [PostController::class, 'index']);

// Halaman Single Post ==> satu per-satu post nya
Route::get('posts/{post:slug}', [PostController::class, 'show']);

// HALAMAN CATEGORIES
Route::get('/categories', function () {
    return view('categories', [
        'title' => 'Post Categories',
        'active' => 'categories',
        'categories' => Category::all(),
    ]);
});

// HALAMAN LOGIN
Route::get('/login', [LoginController::class, 'index'])
    ->name('login')
    ->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// HALAMAN REGISTER
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// HALAMAN DASHBOARD
Route::get('/dashboard', function () {
    return view('dashboard.index');
})
    ->name('dashboard.index')
    ->middleware('auth');

// DASHBOARD POSTS
Route::get('/dashboard-posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard-posts', DashboardPostController::class)->middleware('auth');

// DASHBOARD CATEGORIES
Route::get('/dashboard/categories/checkSlug', [AdminCategoryController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard-categories', AdminCategoryController::class)->middleware('can:admin');

// HALAMAN AUTHOR
Route::get('/authors', function() {
    return view('authors', [
        'title' => 'All Authors',
        'active' => 'authors',
        'authors' => User::all()
    ]);
});

// DASHBOARD PROFILE
Route::get('/dashboard/profile', [DashboardProfileController::class, 'index']);
Route::post('/dashboard/profile', [DashboardProfileController::class, 'update']);
Route::delete('/dashboard/profile', [DashboardProfileController::class, 'destroy']);