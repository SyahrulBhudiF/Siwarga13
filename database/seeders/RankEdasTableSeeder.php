<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RankEdasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['id_keluarga' => '1', 'score' => '0.417'],
            ['id_keluarga' => '2', 'score' => '0.791'],
            ['id_keluarga' => '3', 'score' => '0.000'],
            ['id_keluarga' => '4', 'score' => '1.000'],
            ['id_keluarga' => '5', 'score' => '0.731'],
        ];

        DB::table('rank_edas')->insert($data);
    }
}
