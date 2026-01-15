<?php

namespace Database\Seeders\Development;

use App\Models\Course;
use App\Models\Homework;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class HomeworkSeeder extends Seeder
{
    public function run(): void
    {
        $courses = Course::all();

        $homeworkTemplates = [
            [
                'title' => 'Latihan Soal Bab 1',
                'content' => '<h3>Petunjuk Pengerjaan</h3>
                <p>Kerjakan soal-soal berikut dengan teliti. Tulis jawaban di file PDF dan upload melalui form yang tersedia.</p>
                <h4>Soal:</h4>
                <ol>
                    <li>Jelaskan konsep dasar yang telah dipelajari!</li>
                    <li>Berikan 3 contoh penerapan dalam kehidupan sehari-hari.</li>
                    <li>Selesaikan studi kasus yang diberikan.</li>
                </ol>',
            ],
            [
                'title' => 'Tugas Praktikum',
                'content' => '<h3>Tugas Praktikum</h3>
                <p>Lakukan praktikum sesuai dengan panduan yang telah diberikan.</p>
                <h4>Langkah-langkah:</h4>
                <ol>
                    <li>Siapkan alat dan bahan yang diperlukan.</li>
                    <li>Ikuti prosedur dengan hati-hati.</li>
                    <li>Catat hasil pengamatan dalam bentuk tabel.</li>
                    <li>Buat laporan dan kesimpulan.</li>
                </ol>',
            ],
            [
                'title' => 'Essay dan Analisis',
                'content' => '<h3>Tugas Essay</h3>
                <p>Tulis essay minimal 500 kata tentang topik yang telah ditentukan.</p>
                <h4>Kriteria Penilaian:</h4>
                <ul>
                    <li>Kedalaman analisis (40%)</li>
                    <li>Kelengkapan referensi (30%)</li>
                    <li>Tata bahasa dan struktur (30%)</li>
                </ul>',
            ],
        ];

        foreach ($courses as $course) {
            foreach ($homeworkTemplates as $template) {
                Homework::create([
                    'title' => $template['title'],
                    'slug' => Str::slug($template['title'] . '-' . $course->id . '-' . Str::random(4)),
                    'content' => $template['content'],
                    'course_id' => $course->id,
                ]);
            }
        }
    }
}
