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

        // Create a dummy PDF file for assignments
        $dummyPdfContent = '%PDF-1.4 Dummy Assignment File';
        $pdfPath = 'assignments/dummy_assignment.pdf';
        Storage::disk('public')->put($pdfPath, $dummyPdfContent);

        $statuses = ['submitted', 'graded'];

        foreach ($homeworks as $homework) {
            foreach ($students->take(3) as $student) {
                $status = $statuses[array_rand($statuses)];
                $point = $status === 'graded' ? rand(60, 100) : null;

                // Copy the dummy PDF with a unique name
                $uniquePdfPath = 'assignments/' . Str::uuid() . '.pdf';
                Storage::disk('public')->copy($pdfPath, $uniquePdfPath);

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
