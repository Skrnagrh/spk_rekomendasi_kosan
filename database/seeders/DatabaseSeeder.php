<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\KriteriaSeeder;
use Database\Seeders\AlternatifSeeder;
use Database\Seeders\NilaiBobotSeeder;
use Database\Seeders\SubkriteriaSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            AlternatifSeeder::class,
            KriteriaSeeder::class,
            SubkriteriaSeeder::class,
            NilaiBobotSeeder::class
        ]);
    }
}
