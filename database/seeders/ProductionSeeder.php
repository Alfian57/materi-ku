<?php

namespace Database\Seeders;

use Database\Seeders\Production\UserSeeder;
use Database\Seeders\Production\CourseCategorySeeder;
use Illuminate\Database\Seeder;

class ProductionSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CourseCategorySeeder::class,
        ]);
    }
}
