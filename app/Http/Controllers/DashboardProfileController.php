<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class DashboardProfileController extends Controller
{
    public function index()
    {
        return view('dashboard.profile.index', [
            'title' => 'My Profile',
            'user' => auth()->user(),
        ]);
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        // Tambahkan validasi 'required' agar tidak bisa submit kosong
        $request->validate(
            [
                'image' => 'required|image|file|max:1024',
            ],
            [
                // Pesan error custom dalam bahasa Indonesia
                'image.required' => 'Select a photo first before pressing the button!',
            ],
        );

        if ($request->file('image')) {
            if ($user->image) {
                Storage::delete($user->image);
            }
            $validatedData['image'] = $request->file('image')->store('user-images');

            User::where('id', $user->id)->update($validatedData);
            return redirect('/dashboard/profile')->with('success', 'Profile picture updated!');
        }
    }

    public function destroy()
    {
        $user = auth()->user();

        // 1. Cek apakah user punya foto
        if ($user->image) {
            // 2. Hapus file fisik di storage agar tidak nyampah
            Storage::delete($user->image);
        }

        // 3. Update database: set kolom image menjadi null
        User::where('id', $user->id)->update(['image' => null]);

        return redirect('/dashboard/profile')->with('success', 'Profile picture has been deleted!');
    }
}
