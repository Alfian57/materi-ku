<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Homework;
use Illuminate\Http\Request;

class TeacherHomeworkController extends Controller
{
    public function index(Course $course)
    {
        return view('dashboard.pages.homework.index', [
            'title' => 'Manajemen Tugas',
            'course' => $course,
            'homeworks' => $course->homeworks()->latest()->get(),
        ]);
    }

    public function create(Course $course)
    {
        return view('dashboard.pages.homework.create', [
            'title' => 'Tambah Tugas',
            'course' => $course,
        ]);
    }

    public function store(Request $request, Course $course)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $course->homeworks()->create($validatedData);

        toast('Tugas berhasil ditambahkan!', 'success');

        return redirect()->route('dashboard.homeworks.index', $course->slug);
    }

    public function show(Course $course, Homework $homework)
    {
        return view('dashboard.pages.homework.show', [
            'title' => 'Detail Tugas',
            'course' => $course,
            'homework' => $homework,
        ]);
    }

    public function edit(Course $course, Homework $homework)
    {
        return view('dashboard.pages.homework.edit', [
            'title' => 'Edit Tugas',
            'course' => $course,
            'homework' => $homework,
        ]);
    }

    public function update(Request $request, Course $course, Homework $homework)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $homework->update($validatedData);

        toast('Tugas berhasil diperbarui!', 'success');

        return redirect()->route('dashboard.homeworks.index', $course->slug);
    }

    public function destroy(Course $course, Homework $homework)
    {
        $homework->delete();

        toast('Tugas berhasil dihapus!', 'success');

        return redirect()->route('dashboard.homeworks.index', $course->slug);
    }
}
