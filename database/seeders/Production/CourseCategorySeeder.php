<?php

namespace Database\Seeders\Production;

use App\Models\CourseCategory;
use Illuminate\Database\Seeder;

class CourseCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Pemrograman',
            'Matematika',
            'Bahasa Indonesia',
            'Bahasa Inggris',
            'Fisika',
            'Kimia',
            'Biologi',
            'Sejarah',
            'Geografi',
            'Ekonomi',
            'Seni & Budaya',
            'Pendidikan Kewarganegaraan',
        ];

        foreach ($categories as $category) {
            CourseCategory::create(['name' => $category]);
        }
    }
}
