<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('dashboard.pages.profile.index', [
            'title' => 'Profil',
        ]);
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:100|unique:accounts,email,' . $request->user()->id,
        ]);

        $request->user()->update($request->only('email'));

        return back()->with('success', 'Profil berhasil diperbarui');
    }

    public function updateProfilePic(Request $request)
    {
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Delete old profile picture if exists
        if ($request->user()->profile_picture) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($request->user()->profile_picture);
        }

        $profilePic = $request->file('profile_picture')->store('images/profile-pic', ['disk' => 'public']);

        $request->user()->update([
            'profile_picture' => $profilePic,
        ]);

        return back()->with('success', 'Foto profil berhasil diperbarui');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => ['required', 'confirmed', \Illuminate\Validation\Rules\Password::min(8)->letters()->numbers()],
        ]);

        if (!Hash::check($request->current_password, $request->user()->password)) {
            return back()->with('error', 'Kata sandi saat ini salah');
        }

        $request->user()->update([
            'password' => $request->new_password,
        ]);

        return back()->with('success', 'Kata sandi berhasil diperbarui');
    }
}
