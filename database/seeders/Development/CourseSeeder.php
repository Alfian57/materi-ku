<?php

namespace Database\Seeders\Development;

use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $categories = CourseCategory::all();
        $teachers = Teacher::all();

        $courses = [
            [
                'title' => 'Dasar-Dasar Pemrograman Python',
                'description' => 'Pelajari dasar-dasar pemrograman menggunakan bahasa Python yang mudah dipahami untuk pemula.',
                'category' => 'Pemrograman',
                'image' => 'course_programming.jpg',
                'content' => '<h2>Selamat Datang di Kursus Python!</h2>
                <p>Python adalah bahasa pemrograman yang sangat populer dan mudah dipelajari. Dalam kursus ini, Anda akan mempelajari:</p>
                <ul>
                    <li>Variabel dan Tipe Data</li>
                    <li>Struktur Kontrol (if, for, while)</li>
                    <li>Fungsi dan Modul</li>
                    <li>Pemrograman Berorientasi Objek</li>
                </ul>
                <h3>Mengapa Python?</h3>
                <p>Python banyak digunakan dalam bidang Data Science, Machine Learning, Web Development, dan Automation.</p>',
            ],
            [
                'title' => 'Matematika Dasar untuk SMA',
                'description' => 'Materi matematika lengkap untuk siswa SMA mencakup aljabar, geometri, dan trigonometri.',
                'category' => 'Matematika',
                'image' => 'course_math.jpg',
                'content' => '<h2>Materi Matematika SMA</h2>
                <p>Kursus ini dirancang untuk membantu siswa SMA memahami konsep matematika dengan mudah.</p>
                <h3>Materi yang Dipelajari:</h3>
                <ul>
                    <li>Persamaan dan Pertidaksamaan Linear</li>
                    <li>Fungsi Kuadrat</li>
                    <li>Trigonometri Dasar</li>
                    <li>Geometri Bidang dan Ruang</li>
                </ul>
                <p>Setiap materi dilengkapi dengan contoh soal dan pembahasan.</p>',
            ],
            [
                'title' => 'Fisika: Mekanika dan Gelombang',
                'description' => 'Pahami konsep fisika mekanika dan gelombang dengan penjelasan yang mudah dipahami.',
                'category' => 'Fisika',
                'image' => 'course_physics.jpg',
                'content' => '<h2>Fisika Mekanika & Gelombang</h2>
                <p>Fisika adalah ilmu yang mempelajari fenomena alam. Dalam kursus ini kita akan membahas:</p>
                <h3>Bab 1: Kinematika</h3>
                <p>Mempelajari gerak benda tanpa memperhatikan penyebabnya.</p>
                <h3>Bab 2: Dinamika</h3>
                <p>Mempelajari gerak benda dengan memperhatikan gaya yang bekerja.</p>
                <h3>Bab 3: Gelombang</h3>
                <p>Memahami sifat-sifat gelombang mekanik dan elektromagnetik.</p>',
            ],
            [
                'title' => 'Bahasa Inggris untuk Pemula',
                'description' => 'Belajar bahasa Inggris dari dasar dengan metode yang menyenangkan dan praktis.',
                'category' => 'Bahasa Inggris',
                'image' => 'course_english.jpg',
                'content' => '<h2>English for Beginners</h2>
                <p>Selamat datang di kursus Bahasa Inggris untuk pemula!</p>
                <h3>Lesson 1: Greetings</h3>
                <ul>
                    <li>Hello, how are you?</li>
                    <li>Good morning / afternoon / evening</li>
                    <li>Nice to meet you</li>
                </ul>
                <h3>Lesson 2: Introducing Yourself</h3>
                <p>My name is... I am from... I am a student...</p>
                <h3>Lesson 3: Basic Grammar</h3>
                <p>Present tense, articles (a, an, the), pronouns</p>',
            ],
            [
                'title' => 'Sejarah Indonesia Modern',
                'description' => 'Mempelajari sejarah Indonesia dari masa kemerdekaan hingga era reformasi.',
                'category' => 'Sejarah',
                'image' => 'course_history.jpg',
                'content' => '<h2>Sejarah Indonesia Modern</h2>
                <p>Kursus ini membahas perjalanan bangsa Indonesia dari masa perjuangan kemerdekaan hingga era modern.</p>
                <h3>Bab 1: Proklamasi Kemerdekaan</h3>
                <p>Peristiwa 17 Agustus 1945 dan pembentukan pemerintahan.</p>
                <h3>Bab 2: Orde Lama dan Orde Baru</h3>
                <p>Kepemimpinan Soekarno dan Soeharto.</p>
                <h3>Bab 3: Era Reformasi</h3>
                <p>Perubahan politik dan sosial pasca 1998.</p>',
            ],
        ];

        foreach ($courses as $data) {
            $category = $categories->firstWhere('name', $data['category']);
            $teacher = $teachers->random();

            // Copy fixture image to public storage with unique name
            $fixtureImage = storage_path('fixtures/' . $data['image']);
            $imageName = 'images/courses/' . Str::uuid() . '.jpg';

            if (file_exists($fixtureImage)) {
                Storage::disk('public')->put($imageName, file_get_contents($fixtureImage));
            }

            Course::create([
                'title' => $data['title'],
                'slug' => Str::slug($data['title']),
                'description' => $data['description'],
                'content' => $data['content'],
                'thumbnail' => $imageName,
                'course_category_id' => $category?->id ?? 1,
                'teacher_id' => $teacher->id,
            ]);
        }
    }
}
