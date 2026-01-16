<?php

namespace App\Http\Controllers;

use App\Http\Traits\HasAccountable;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    use HasAccountable;

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

        return $this->storeAccountable(
            $request,
            Admin::class,
            ['name'],
            'Admin berhasil ditambahkan!',
            'dashboard.admins.index'
        );
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

        return $this->updateAccountable(
            $request,
            $admin,
            ['name'],
            'Admin berhasil diperbarui!',
            'dashboard.admins.index'
        );
    }

    public function destroy(Admin $admin)
    {
        if ($admin->account->id === auth()->id()) {
            toast('Anda tidak dapat menghapus akun sendiri!', 'error');
            return redirect()->back();
        }

        return $this->destroyAccountable(
            $admin,
            'Admin berhasil dihapus!',
            'dashboard.admins.index'
        );
    }
}
