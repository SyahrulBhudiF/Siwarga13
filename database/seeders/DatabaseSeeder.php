<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AlamatTableSeeder::class,
            StatusTableSeeder::class,
            WargaTableSeeder::class,
            KeluargaTableSeeder::class,
            UserTableSeeder::class,
            RankMabacTableSeeder::class,
            RankEdasTableSeeder::class,
        ]);
    }
}
