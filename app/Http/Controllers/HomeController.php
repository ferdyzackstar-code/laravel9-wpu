<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            "title" => "Home",
            "active" => "home",
            "categories" => Category::take(3)->get(),
            // Mengambil 3 author, dihitung jumlah postnya, dan diacak fotonya nanti di view
            "authors" => User::has('posts')->withCount('posts')->take(3)->get()
        ]);
    }
}