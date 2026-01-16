<?php

namespace App\Http\Controllers;

use App\Http\Traits\HasAccountable;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    use HasAccountable;

    public function index()
    {
        return view('dashboard.pages.teacher.index', [
            'title' => 'Manajemen Pengajar',
            'teachers' => Teacher::with('account')->latest()->get(),
        ]);
    }

    public function create()
    {
        return view('dashboard.pages.teacher.create', [
            'title' => 'Tambah Pengajar',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:100|unique:accounts,email',
            'password' => 'required|min:8|confirmed',
            'nip' => 'required|string|size:18|unique:teachers,nip',
            'address' => 'required|string',
        ]);

        return $this->storeAccountable(
            $request,
            Teacher::class,
            ['name', 'nip', 'address'],
            'Pengajar berhasil ditambahkan!',
            'dashboard.teachers.index'
        );
    }

    public function edit(Teacher $teacher)
    {
        return view('dashboard.pages.teacher.edit', [
            'title' => 'Edit Pengajar',
            'teacher' => $teacher,
        ]);
    }

    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:100|unique:accounts,email,' . $teacher->account->id,
            'password' => 'nullable|min:8|confirmed',
            'nip' => 'required|string|size:18|unique:teachers,nip,' . $teacher->id,
            'address' => 'required|string',
        ]);

        return $this->updateAccountable(
            $request,
            $teacher,
            ['name', 'nip', 'address'],
            'Pengajar berhasil diperbarui!',
            'dashboard.teachers.index'
        );
    }

    public function destroy(Teacher $teacher)
    {
        return $this->destroyAccountable(
            $teacher,
            'Pengajar berhasil dihapus!',
            'dashboard.teachers.index'
        );
    }
}
