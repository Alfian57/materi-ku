<?php

namespace Database\Seeders;

use Database\Seeders\Production\AdminSeeder;
use Database\Seeders\Production\CourseCategorySeeder;
use Illuminate\Database\Seeder;

class ProductionSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            CourseCategorySeeder::class,
        ]);
    }
}
