<?php

namespace Database\Seeders\Production;

use App\Models\Account;
use App\Models\Admin;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        $admin = Admin::create([
            'name' => 'Administrator',
        ]);

        Account::create([
            'accountable_id' => $admin->id,
            'accountable_type' => Admin::class,
            'email' => 'admin@materi-ku.com',
            'password' => bcrypt('password'),
        ]);

        // Teacher
        $teacher = Teacher::create([
            'name' => 'Teacher',
        ]);

        Account::create([
            'accountable_id' => $teacher->id,
            'accountable_type' => Teacher::class,
            'email' => 'teacher@materi-ku.com',
            'password' => bcrypt('password'),
        ]);

        // Student
        $student = Student::create([
            'name' => 'Alfian',
        ]);

        Account::create([
            'accountable_id' => $student->id,
            'accountable_type' => Student::class,
            'email' => 'alfian@student.com',
            'password' => bcrypt('password'),
        ]);
    }
}
