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
            'email' => 'required|email|max:100',
        ]);

        $request->user()->update($request->only('email'));

        toast('Profil berhasil diperbarui', 'success');

        return back();
    }

    public function updateProfilePic(Request $request)
    {
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $profilePic = $request->file('profile_picture')->store('images/profile-pic', ['disk' => 'public']);

        $request->user()->update([
            'profile_picture' => $profilePic,
        ]);

        toast('Foto profil berhasil diperbarui', 'success');

        return back();
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed|min:8',
        ]);

        if (!Hash::check($request->current_password, $request->user()->password)) {
            toast('Kata sandi saat ini salah', 'error');

            return back();
        }

        $request->user()->update([
            'password' => $request->new_password,
        ]);

        toast('Kata sandi berhasil diperbarui', 'success');

        return back();
    }
}
