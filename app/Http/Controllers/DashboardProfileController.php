<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class DashboardProfileController extends Controller
{
    public function index() {
        return view('dashboard.profile.index', [
            'title' => 'My Profile',
            'user' => auth()->user()
        ]);
    }

    public function update(Request $request) {
    $user = auth()->user();
    
    $rules = [
        'image' => 'image|file|max:1024' // Validasi file harus gambar & max 1MB
    ];

    $validatedData = $request->validate($rules);

    if($request->file('image')) {
        // --- LOGIKA ANTI NYAMPAH DIMULAI ---
        // Jika user sebelumnya SUDAH punya foto di folder storage
        if($user->image) {
            // Kita hapus file fisik foto lamanya dari folder storage/app/public/user-images
            Storage::delete($user->image);
        }
        // --- LOGIKA ANTI NYAMPAH SELESAI ---

        // Baru simpan foto yang baru diupload
        $validatedData['image'] = $request->file('image')->store('user-images');
    }

    // Update database
    User::where('id', $user->id)->update($validatedData);

    return redirect('/dashboard/profile')->with('success', 'Profile picture updated successfully!');
}
}