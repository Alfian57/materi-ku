<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return view('dashboard.pages.student.index', [
            'title' => 'Manajemen Siswa',
            'students' => Student::with('account')->latest()->get(),
        ]);
    }

    public function create()
    {
        return view('dashboard.pages.student.create', [
            'title' => 'Tambah Siswa',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:100|unique:accounts,email',
            'password' => 'required|min:8|confirmed',
            'address' => 'required|string',
        ]);

        $student = Student::create($request->only('name', 'address', 'point'));
        $student->account()->create($request->only('email', 'password'));

        toast('Siswa berhasil ditambahkan!', 'success');

        return redirect()->route('dashboard.students.index');
    }

    public function edit(Student $student)
    {
        return view('dashboard.pages.student.edit', [
            'title' => 'Edit Siswa',
            'student' => $student,
        ]);
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:100|unique:accounts,email,' . $student->account->id,
            'password' => 'nullable|min:8|confirmed',
            'address' => 'required|string',
        ]);

        $student->update($request->only('name', 'address', 'point'));
        $student->account->update($request->only('email'));

        if ($request->filled('password')) {
            $student->account->update(['password' => $request->input('password')]);
        }

        toast('Siswa berhasil diperbarui!', 'success');

        return redirect()->route('dashboard.students.index');
    }

    public function destroy(Student $student)
    {
        $student->account->delete();
        $student->delete();

        toast('Siswa berhasil dihapus!', 'success');

        return redirect()->route('dashboard.students.index');
    }
}
