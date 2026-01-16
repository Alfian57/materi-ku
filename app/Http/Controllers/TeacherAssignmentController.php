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
        $assignments = $homework->assignments()->with('student')->latest()->get();

        // Check which students already have a graded assignment for this homework
        $gradedStudentIds = Assignment::where('homework_id', $homework->id)
            ->where('status', 'graded')
            ->pluck('student_id')
            ->toArray();

        return view('dashboard.pages.assignment.index', [
            'title' => 'Manajemen Pengumpulan',
            'course' => $course,
            'homework' => $homework,
            'assignments' => $assignments,
            'gradedStudentIds' => $gradedStudentIds,
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

        // Logic: Calculate point difference if this assignment was already graded,
        // OR simply add points if no OTHER assignment for this homework is graded.

        $newPoint = (int) $request->point;
        $oldPoint = (int) $assignment->point; // 0 if null
        $wasGraded = $assignment->status === 'graded';

        // Check if any OTHER assignment for this student & homework is already graded
        $otherGradedExists = Assignment::where('homework_id', $homework->id)
            ->where('student_id', $assignment->student_id)
            ->where('status', 'graded')
            ->where('id', '!=', $assignment->id)
            ->exists();

        $pointDiff = 0;

        if (!$otherGradedExists) {
            // This is the primary graded assignment (or the only one).
            // If it was already graded, we adjust the difference.
            // If it wasn't graded, we add the full new point.
            if ($wasGraded) {
                $pointDiff = $newPoint - $oldPoint;
            } else {
                $pointDiff = $newPoint;
            }
        }
        // If other graded exists, pointDiff remains 0 (no points awarded/adjusted for duplicate submissions).

        $assignment->update([
            'point' => $newPoint,
            'status' => 'graded',
        ]);

        if ($pointDiff != 0) {
            $assignment->student->update([
                'point' => $assignment->student->point + $pointDiff,
            ]);

            // Level up logic? (Simplified: check threshold, but user didn't explicitly ask for level logic refactor, keeping it minimal)
            if ($assignment->student->point >= 100) {
                $assignment->student->update([
                    'point' => $assignment->student->point - 100,
                    'level' => $assignment->student->level + 1,
                ]);
            }
        }

        toast('Nilai berhasil disimpan!', 'success');

        return redirect()->route('dashboard.assignments.index', [$course->slug, $homework->slug]);
    }
}
