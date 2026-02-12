<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
//import Facades Storage
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.posts.index', [
            'posts' => Post::where('user_id', auth()->user()->id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'body' => 'required',
        ]);

        return $request->file('image')->store('post-images');

        //upload image
        $image = $request->file('image');
        $image->storeAs('posts', $image->hashName());

        $validatedData['image'] = $image->hashName();
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Post::create($validatedData);
        return redirect('/dashboard-posts')->with('success', 'New Post Has Been Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        // dd()
        return view('dashboard.posts.show', [
            'data' => Post::where('slug', $id)->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dashboard.posts.edit', [
            'edit' => Post::find($id),
            'categories' => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $edit = Post::find($id);

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required',
            'category_id' => 'required',
            'body' => 'required',
        ]);

        //check if image is uploaded
        if ($request->hasFile('image')) {
            //delete old image
            Storage::delete('posts/' . $edit->image);

            //upload new image
            $image = $request->file('image');
            $image->storeAs('posts', $image->hashName());

                        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

            //update product with new image
            $edit->update([
                'image' => $image->hashName(),
                'title' => $request->title,
                'slug' => $request->slug,
                'category_id' => $request->category_id,
                'excerpt' => $validatedData['excerpt'],
                'body' => $request->body,
            ]);
        } else {
            $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

            // dd($validatedData['excerpt']);

            $edit->update([
                'title' => $request->title,
                'slug' => $request->slug,
                'category_id' => $request->category_id,
                'excerpt' => $validatedData['excerpt'],
                'body' => $request->body,
            ]);
        }

        return redirect('/dashboard-posts')->with('success', 'New Post Has Been Updated!');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect('/dashboard-posts')->with('success', 'Post has been deleted!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
