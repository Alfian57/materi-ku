<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Course;
use App\Models\Homework;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentCourseController extends Controller
{
    public function learn(Course $course)
    {
        return view('dashboard.pages.student-course.learn', [
            'title' => 'Belajar ' . $course->title,
            'course' => $course,
        ]);
    }

    public function homework(Course $course)
    {
        return view('dashboard.pages.student-course.homework', [
            'title' => 'Tugas',
            'course' => $course,
        ]);
    }

    public function form(Course $course, Homework $homework)
    {
        return view('dashboard.pages.student-course.assignment', [
            'title' => 'Kumpulkan Tugas ' . $homework->course->title,
            'course' => $course,
            'homework' => $homework,
        ]);
    }

    public function submit(Request $request, Course $course, Homework $homework)
    {
        $request->validate([
            'file' => 'required|mimes:pdf|max:2048',
            'review' => 'required',
        ]);

        Assignment::create([
            'student_id' => Auth::user()->accountable->id,
            'answer' => $request->answer,
            'file' => $request->file('file')->store('assignments', ['disk' => 'public']),
            'status' => 'submitted',
            'homework_id' => $homework->id,
        ]);

        Review::create([
            'student_id' => Auth::user()->accountable->id,
            'course_id' => $homework->course->id,
            'content' => $request->review,
        ]);

        toast('Tugas berhasil dikumpulkan', 'success');

        return redirect()->route('dashboard.student.course.homework', $homework->course);
    }
}
