<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Course;
use App\Models\Homework;
use Illuminate\Http\Request;

class TeacherAssignmentController extends Controller
{
    public function index(Course $course, Homework $homework)
    {
        return view('dashboard.pages.assignment.index', [
            'title' => 'Manajemen Pengumpulan',
            'course' => $course,
            'homework' => $homework,
            'assignments' => $homework->assignments()->with('student')->latest()->get(),
        ]);
    }

    public function show(Course $course, Homework $homework, Assignment $assignment)
    {
        return view('dashboard.pages.assignment.show', [
            'title' => 'Detail Pengumpulan',
            'course' => $course,
            'homework' => $homework,
            'assignment' => $assignment,
        ]);
    }

    public function update(Request $request, Course $course, Homework $homework, Assignment $assignment)
    {
        $request->validate([
            'point' => 'required|numeric|min:0|max:100',
        ]);

        $assignment->update([
            'point' => $request->point,
            'status' => 'graded',
        ]);

        if ($assignment->student->point >= 100) {
            $assignment->student->update([
                'point' => $assignment->student->point - 100,
                'level' => $assignment->student->level + 1,
            ]);
        }

        toast('Nilai berhasil disimpan!', 'success');

        return redirect()->route('dashboard.assignments.index', [$course->slug, $homework->slug]);
    }
}
