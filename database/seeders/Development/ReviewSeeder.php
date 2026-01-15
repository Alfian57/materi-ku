<?php

namespace Database\Seeders\Development;

use App\Models\Course;
use App\Models\Review;
use App\Models\Student;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        $students = Student::all();
        $courses = Course::all();

        $reviewTemplates = [
            ['content' => 'Materi kursus ini sangat membantu! Penjelasannya mudah dipahami.', 'status' => 'published'],
            ['content' => 'Guru mengajar dengan sangat jelas. Recommended untuk pemula!', 'status' => 'published'],
            ['content' => 'Konten lengkap dan terstruktur dengan baik. Terima kasih!', 'status' => 'published'],
            ['content' => 'Saya jadi lebih paham setelah mengikuti kursus ini.', 'status' => 'published'],
            ['content' => 'Kursus yang bagus, tapi alangkah lebih baik jika ada video.', 'status' => 'published'],
            ['content' => 'Mantap! Materinya up-to-date dan relevan.', 'status' => 'published'],
            ['content' => 'Spam review - ini harus diblokir.', 'status' => 'blocked'],
        ];

        foreach ($courses as $course) {
            foreach ($students->take(3) as $student) {
                $template = $reviewTemplates[array_rand($reviewTemplates)];

                Review::create([
                    'student_id' => $student->id,
                    'course_id' => $course->id,
                    'content' => $template['content'],
                    'status' => $template['status'],
                ]);
            }
        }
    }
}
