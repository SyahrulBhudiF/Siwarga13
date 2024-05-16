<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlamatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['alamat' => 'Jalan Merdeka No. 123', 'rt' => 'RT 1'],
            ['alamat' => 'Jalan Merdeka No. 123', 'rt' => 'RT 1'],
            ['alamat' => 'Jalan Merdeka No. 123', 'rt' => 'RT 1'],
            ['alamat' => 'Jalan Merdeka No. 123', 'rt' => 'RT 1'],

            ['alamat' => 'Jalan Kemerdekaan No. 456', 'rt' => 'RT 2'],
            ['alamat' => 'Jalan Kemerdekaan No. 456', 'rt' => 'RT 2'],
            ['alamat' => 'Jalan Kemerdekaan No. 456', 'rt' => 'RT 2'],

            ['alamat' => 'Jalan Pahlawan No. 789', 'rt' => 'RT 3'],
            ['alamat' => 'Jalan Pahlawan No. 789', 'rt' => 'RT 3'],
            ['alamat' => 'Jalan Pahlawan No. 789', 'rt' => 'RT 3'],
            ['alamat' => 'Jalan Pahlawan No. 789', 'rt' => 'RT 3'],
            ['alamat' => 'Jalan Pahlawan No. 789', 'rt' => 'RT 3'],

            ['alamat' => 'Jalan Raya No. 101', 'rt' => 'RT 4'],
            ['alamat' => 'Jalan Raya No. 101', 'rt' => 'RT 4'],
            ['alamat' => 'Jalan Raya No. 101', 'rt' => 'RT 4'],
            ['alamat' => 'Jalan Raya No. 101', 'rt' => 'RT 4'],
            ['alamat' => 'Jalan Raya No. 101', 'rt' => 'RT 4'],

            ['alamat' => 'Jalan Sudirman No. 202', 'rt' => 'RT 5'],
            ['alamat' => 'Jalan Sudirman No. 202', 'rt' => 'RT 5'],
            ['alamat' => 'Jalan Sudirman No. 202', 'rt' => 'RT 5'],
            ['alamat' => 'Jalan Sudirman No. 202', 'rt' => 'RT 5'],
            ['alamat' => 'Jalan Sudirman No. 202', 'rt' => 'RT 5'],
            ['alamat' => 'Jalan Sudirman No. 202', 'rt' => 'RT 5'],
        ];

        foreach ($data as $dt) {
            DB::table('alamat')->insert($dt);
        }
    }
}
