<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class StudentHistoryController extends Controller
{
    public function getReviewHistories()
    {
        $user = Auth::user()->accountable;

        return view('dashboard.pages.review-history.index', [
            'title' => 'Riwayat Ulasan',
            'reviews' => Review::query()
                ->where('student_id', $user->id)
                ->with('course')
                ->latest()
                ->get(),
        ]);
    }

    public function getAssignmentHistories()
    {
        $user = Auth::user()->accountable;

        return view('dashboard.pages.assignment-history.index', [
            'title' => 'Riwayat Tugas',
            'assignments' => Assignment::query()
                ->where('student_id', $user->id)
                ->with('homework.course')
                ->latest()
                ->get(),
        ]);
    }
}
