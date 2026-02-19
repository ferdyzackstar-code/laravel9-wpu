<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Hanya bisa diakses jika user adalah admin (logic bisa di middleware/gate)
        return view('dashboard.categories.index', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.categories.create');
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
            'name' => 'required|max:255|unique:categories',
            'slug' => 'required|unique:categories',
            'image' => 'image|file|max:5120',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('category-images');
        }
        
        // dd($validatedData);

        Category::create($validatedData);
        return redirect('/dashboard-categories')->with('success', 'New category added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id) 
    {
        // dd($category);
        // 

        $category = Category::find($id);

        $dataPost = Post::where('user_id', auth()->user()->id)->where('category_id', $category->id)->get();
        dd($dataPost, $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $dashboard_category)
    {
        return view('dashboard.categories.edit', [
            'category' => $dashboard_category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $dashboard_category)
    {
        $rules = [
            'name' => 'required|max:255',
            'image' => 'image|file|max:5120',
        ];

        // Jika slug diganti, validasi unique tetap diperlukan
        if ($request->slug != $dashboard_category->slug) {
            $rules['slug'] = 'required|unique:categories';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('category-images');
        }

        // Menggunakan instance model secara langsung
        Category::where('id', $dashboard_category->id) // <--- Pastikan ini pakai ID
            ->update($validatedData);

        return redirect('/dashboard-categories')->with('success', 'Category updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $dashboard_category)
    {
        // Hapus gambar dari storage jika ada sebelum datanya dihapus
        if ($dashboard_category->image) {
            Storage::delete($dashboard_category->image);
        }

        Category::destroy($dashboard_category->id);
        return redirect('/dashboard-categories')->with('success', 'Category deleted!');
    }

    public function checkSlug(Request $request)
    {
        $slug = \Illuminate\Support\Str::slug($request->name);
        return response()->json(['slug' => $slug]);
    }
}
