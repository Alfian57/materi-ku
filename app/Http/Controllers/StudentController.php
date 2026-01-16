<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Http\Traits\HasAccountable;
use App\Models\Student;

class StudentController extends Controller
{
    use HasAccountable;

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

    public function store(StoreStudentRequest $request)
    {
        return $this->storeAccountable(
            $request,
            Student::class,
            ['name', 'address', 'point'],
            'Siswa berhasil ditambahkan!',
            'dashboard.students.index'
        );
    }

    public function edit(Student $student)
    {
        return view('dashboard.pages.student.edit', [
            'title' => 'Edit Siswa',
            'student' => $student,
        ]);
    }

    public function update(UpdateStudentRequest $request, Student $student)
    {
        return $this->updateAccountable(
            $request,
            $student,
            ['name', 'address', 'point'],
            'Siswa berhasil diperbarui!',
            'dashboard.students.index'
        );
    }

    public function destroy(Student $student)
    {
        return $this->destroyAccountable(
            $student,
            'Siswa berhasil dihapus!',
            'dashboard.students.index'
        );
    }
}
