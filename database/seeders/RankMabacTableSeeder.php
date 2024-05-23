<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RankMabacTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['id_keluarga' => '1', 'score' => '-0.021'],
            ['id_keluarga' => '2', 'score' => '0.129'],
            ['id_keluarga' => '3', 'score' => '-0.346'],
            ['id_keluarga' => '4', 'score' => '0.304'],
            ['id_keluarga' => '5', 'score' => '0.154'],
        ];

        DB::table('rank_mabac')->insert($data);
    }
}
