<?php

namespace Database\Seeders\Development;

use App\Models\Assignment;
use App\Models\Homework;
use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AssignmentSeeder extends Seeder
{
    public function run(): void
    {
        $students = Student::all();
        $homeworks = Homework::take(5)->get();

        // Path to the fixture PDF
        $fixturePdf = storage_path('fixtures/dummy_assignment.pdf');

        $statuses = ['submitted', 'graded'];

        foreach ($homeworks as $homework) {
            foreach ($students->take(3) as $student) {
                $status = $statuses[array_rand($statuses)];
                $point = $status === 'graded' ? rand(60, 100) : null;

                // Copy fixture PDF to public storage with unique name
                $uniquePdfPath = 'assignments/' . Str::uuid() . '.pdf';

                if (file_exists($fixturePdf)) {
                    Storage::disk('public')->put($uniquePdfPath, file_get_contents($fixturePdf));
                }

                Assignment::create([
                    'student_id' => $student->id,
                    'homework_id' => $homework->id,
                    'file' => $uniquePdfPath,
                    'point' => $point,
                    'status' => $status,
                ]);
            }
        }
    }
}
