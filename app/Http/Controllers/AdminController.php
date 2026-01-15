<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('dashboard.pages.admin.index', [
            'title' => 'Manajemen Admin',
            'admins' => Admin::with('account')->latest()->get(),
        ]);
    }

    public function create()
    {
        return view('dashboard.pages.admin.create', [
            'title' => 'Tambah Admin',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:100|unique:accounts,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $admin = Admin::create($request->only('name'));
        $admin->account()->create($request->only('email', 'password'));

        toast('Admin berhasil ditambahkan!', 'success');

        return redirect()->route('dashboard.admins.index');
    }

    public function edit(Admin $admin)
    {
        return view('dashboard.pages.admin.edit', [
            'title' => 'Edit Admin',
            'admin' => $admin,
        ]);
    }

    public function update(Request $request, Admin $admin)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:100|unique:accounts,email,' . $admin->account->id,
            'password' => 'nullable|min:8|confirmed',
        ]);

        $admin->update($request->only('name'));
        $admin->account->update($request->only('email'));

        if ($request->filled('password')) {
            $admin->account->update(['password' => $request->input('password')]);
        }

        toast('Admin berhasil diperbarui!', 'success');

        return redirect()->route('dashboard.admins.index');
    }

    public function destroy(Admin $admin)
    {
        $admin->account->delete();
        $admin->delete();

        toast('Admin berhasil dihapus!', 'success');

        return redirect()->route('dashboard.admins.index');
    }
}
