<?php

namespace App\Http\Controllers;

use App\Models\CourseCategory;
use Illuminate\Http\Request;

class CourseCategoryController extends Controller
{
    public function index()
    {
        return view('dashboard.pages.course-category.index', [
            'title' => 'Manajemen Kategori Kursus',
            'courseCategories' => CourseCategory::latest()->get(),
        ]);
    }

    public function create()
    {
        return view('dashboard.pages.course-category.create', [
            'title' => 'Tambah Kategori Kursus',
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        CourseCategory::create($validatedData);

        toast('Kategori kursus berhasil ditambahkan!', 'success');

        return redirect()->route('dashboard.course-categories.index');
    }

    public function edit(CourseCategory $courseCategory)
    {
        return view('dashboard.pages.course-category.edit', [
            'title' => 'Edit Kategori Kursus',
            'courseCategory' => $courseCategory,
        ]);
    }

    public function update(Request $request, CourseCategory $courseCategory)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $courseCategory->update($validatedData);

        toast('Kategori kursus berhasil diperbarui!', 'success');

        return redirect()->route('dashboard.course-categories.index');
    }

    public function destroy(CourseCategory $courseCategory)
    {
        $courseCategory->delete();

        toast('Kategori kursus berhasil dihapus!', 'success');

        return redirect()->route('dashboard.course-categories.index');
    }
}
