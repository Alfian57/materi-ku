<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseCategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentCourseController;
use App\Http\Controllers\StudentHistoryController;
use App\Http\Controllers\TeacherAssignmentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TeacherCourseController;
use App\Http\Controllers\TeacherHomeworkController;
use App\Http\Controllers\TeacherReviewController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::redirect('login', 'dashboard/login')->name('login');

Route:: as('dashboard.')->prefix('dashboard')->group(function () {

    Route::middleware('guest')->group(function () {
        Route::get('login', [AuthController::class, 'login'])->name('login.index');
        Route::post('login', [AuthController::class, 'authenticate'])->name('login.authenticate');

        Route::get('register', [AuthController::class, 'register'])->name('register.index');
        Route::post('register', [AuthController::class, 'store'])->name('register.store');
    });

    Route::middleware('auth')->group(function () {
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');

        Route::get('/', [DashboardController::class, 'index'])->name('index');
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
        Route::put('/profile', [ProfileController::class, 'updateProfile'])->name('profile.update');
        Route::put('/profile-pic', [ProfileController::class, 'updateProfilePic'])->name('profile-pic.update');
        Route::put('/password', [ProfileController::class, 'updatePassword'])->name('password.update');

        Route::middleware('roles:admin')->group(function () {
            Route::resource('course-categories', CourseCategoryController::class)->except('show');
            Route::resource('admins', AdminController::class)->except('show');
            Route::resource('students', StudentController::class)->except('show');
            Route::resource('teachers', TeacherController::class)->except('show');
        });

        Route::middleware('roles:teacher')->group(function () {
            Route::resource('courses', TeacherCourseController::class);
            Route::resource('courses/{course}/homeworks', TeacherHomeworkController::class);
            Route::resource('courses/{course}/homeworks/{homework}/assignments', TeacherAssignmentController::class)->only(['index', 'show', 'update']);

            Route::post('reviews/{review}/blocked', [TeacherReviewController::class, 'blocked'])->name('reviews.blocked');
            Route::get('blocked-reviews', [TeacherReviewController::class, 'getBlocked'])->name('reviews.getBlocked');
            Route::post('blocked-reviews/{review}/unblocked', [TeacherReviewController::class, 'unblock'])->name('reviews.unblock');
        });
        Route::middleware('roles:student')->as('student.')->group(function () {
            Route::get('learn/{course}', [StudentCourseController::class, 'learn'])->name('course.learn');
            Route::get('learn/{course}/homeworks', [StudentCourseController::class, 'homework'])->name('course.homework');
            Route::get('learn/{course}/homeworks/{homework}', [StudentCourseController::class, 'form'])->name('course.form');
            Route::post('learn/{course}/homeworks/{homework}', [StudentCourseController::class, 'submit'])->name('course.submit');

            Route::get('review-histories', [StudentHistoryController::class, 'getReviewHistories'])->name('reviews.histories');
            Route::get('assignment-histories', [StudentHistoryController::class, 'getAssignmentHistories'])->name('assignment.histories');
        });
    });
});
