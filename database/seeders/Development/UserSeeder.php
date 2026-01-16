<?php

namespace Database\Seeders\Development;

use App\Models\Account;
use App\Models\Admin;
use App\Models\Teacher;
use App\Models\Student;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        $admin = Admin::create(['name' => 'Administrator']);
        Account::create([
            'accountable_id' => $admin->id,
            'accountable_type' => Admin::class,
            'email' => 'admin@materi-ku.com',
            'password' => bcrypt('password'),
        ]);

        // Teachers with realistic Indonesian names
        $teachers = [
            ['name' => 'Dr. Ahmad Wijaya, M.Pd', 'nip' => '198501152010011001', 'address' => 'Jl. Pendidikan No. 45, Jakarta Selatan'],
            ['name' => 'Siti Rahayu, S.Pd', 'nip' => '199003202015012001', 'address' => 'Jl. Merdeka No. 78, Bandung'],
            ['name' => 'Budi Santoso, M.Kom', 'nip' => '198712102012011001', 'address' => 'Jl. Teknologi No. 12, Surabaya'],
        ];

        foreach ($teachers as $index => $data) {
            $teacher = Teacher::create($data);
            Account::create([
                'accountable_id' => $teacher->id,
                'accountable_type' => Teacher::class,
                'email' => $index === 0 ? 'teacher@materi-ku.com' : 'guru' . ($index + 1) . '@materi-ku.com',
                'password' => bcrypt('password'),
            ]);
        }

        // Students with realistic Indonesian names
        $students = [
            ['name' => 'Alfian Gading', 'address' => 'Jl. Melati No. 10, Jakarta Timur', 'point' => 85, 'level' => 3],
            ['name' => 'Dimas Pratama', 'address' => 'Jl. Anggrek No. 25, Depok', 'point' => 120, 'level' => 5],
            ['name' => 'Anisa Putri', 'address' => 'Jl. Mawar No. 8, Tangerang', 'point' => 45, 'level' => 2],
            ['name' => 'Rizky Ramadhan', 'address' => 'Jl. Kenanga No. 15, Bekasi', 'point' => 200, 'level' => 7],
            ['name' => 'Maya Sari', 'address' => 'Jl. Dahlia No. 33, Bogor', 'point' => 60, 'level' => 2],
        ];

        foreach ($students as $index => $data) {
            $student = Student::create($data);
            Account::create([
                'accountable_id' => $student->id,
                'accountable_type' => Student::class,
                'email' => $index === 0 ? 'alfian@student.com' : 'siswa' . ($index + 1) . '@materi-ku.com',
                'password' => bcrypt('password'),
            ]);
        }
    }
}
