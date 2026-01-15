<?php

namespace Database\Seeders;

use Database\Seeders\Development\AssignmentSeeder;
use Database\Seeders\Development\CourseSeeder;
use Database\Seeders\Development\HomeworkSeeder;
use Database\Seeders\Development\ReviewSeeder;
use Database\Seeders\Development\UserSeeder;
use Database\Seeders\Production\CourseCategorySeeder;
use Illuminate\Database\Seeder;

class DevelopmentSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
                // First, create categories (from production)
            CourseCategorySeeder::class,

                // Then create users
            UserSeeder::class,

                // Then create courses (needs users & categories)
            CourseSeeder::class,

                // Then create homework (needs courses)
            HomeworkSeeder::class,

                // Then create assignments (needs homework & students)
            AssignmentSeeder::class,

                // Finally create reviews (needs courses & students)
            ReviewSeeder::class,
        ]);
    }
}
