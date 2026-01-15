<?php

namespace Database\Seeders\Production;

use App\Models\Account;
use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $admin = Admin::create([
            'name' => 'Administrator',
        ]);

        Account::create([
            'accountable_id' => $admin->id,
            'accountable_type' => Admin::class,
            'email' => 'admin@materi-ku.com',
            'password' => bcrypt('password'),
        ]);
    }
}
