<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * Usage:
     * - Production: php artisan db:seed --class=ProductionSeeder
     * - Development: php artisan db:seed --class=DevelopmentSeeder
     * - Or use APP_ENV to determine automatically:
     *   - php artisan db:seed (uses development if APP_ENV=local, production otherwise)
     */
    public function run(): void
    {
        if (app()->environment('local', 'development', 'testing')) {
            $this->call(DevelopmentSeeder::class);
        } else {
            $this->call(ProductionSeeder::class);
        }
    }
}
