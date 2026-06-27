<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    /**
     * Tampilkan halaman profile user yang sedang login.
     */
    public function index()
    {
        $user = Auth::user();

        return view('profile.index', compact('user'));
    }

    /**
     * Update data profile (nama & email).
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name'  => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
        ]);

        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('profile.index')
            ->with('success', 'Profil berhasil diperbarui');
    }

    /**
     * Update foto profil.
     */
    public function updatePhoto(Request $request)
    {
        $request->validate([
            'photo' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ]);

        $user = Auth::user();

        // Hapus foto lama jika ada
        if ($user->photo) {
            Storage::disk('public')->delete($user->photo);
        }

        $path = $request->file('photo')->store('profile-photos', 'public');

        $user->update([
            'photo' => $path,
        ]);

        return redirect()->route('profile.index')
            ->with('success', 'Foto profil berhasil diperbarui');
    }

    /**
     * Update password.
     */
    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password'          => ['required', 'confirmed', Password::min(8)],
        ]);

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('profile.index')
            ->with('success', 'Password berhasil diperbarui');
    }
}
