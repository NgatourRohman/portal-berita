<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        // Ambil user yang login
        $user = Auth::user(); // return instance of App\Models\User

        if (!$user instanceof \App\Models\User) {
            abort(500, 'User model tidak ditemukan');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed'
        ]);

        // Assign manual ke masing-masing field
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save(); // ⬅ ini menggantikan `update()`

        return redirect()->route('profile.edit')->with('success', 'Profil berhasil diperbarui.');
    }
}
