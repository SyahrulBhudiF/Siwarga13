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
            ['alamat' => 'Jalan Kemerdekaan No. 456', 'rt' => 'RT 2'],
            ['alamat' => 'Jalan Pahlawan No. 789', 'rt' => 'RT 3'],
            ['alamat' => 'Jalan Raya No. 101', 'rt' => 'RT 4'],
            ['alamat' => 'Jalan Sudirman No. 202', 'rt' => 'RT 1'],
            ['alamat' => 'Jalan Gatot Subroto No. 303', 'rt' => 'RT 2'],
            ['alamat' => 'Jalan Diponegoro No. 404', 'rt' => 'RT 3'],
            ['alamat' => 'Jalan Surya Kencana No. 505', 'rt' => 'RT 4'],
            ['alamat' => 'Jalan A. Yani No. 606', 'rt' => 'RT 5'],
            ['alamat' => 'Jalan Gajah Mada No. 707', 'rt' => 'RT 1'],
            ['alamat' => 'Jalan Asia Afrika No. 808', 'rt' => 'RT 2'],
            ['alamat' => 'Jalan Hayam Wuruk No. 909', 'rt' => 'RT 3'],
            ['alamat' => 'Jalan Imam Bonjol No. 1001', 'rt' => 'RT 4'],
            ['alamat' => 'Jalan Juanda No. 1102', 'rt' => 'RT 5'],
            ['alamat' => 'Jalan Cendrawasih No. 1203', 'rt' => 'RT 1'],
            ['alamat' => 'Jalan Dipati Ukur No. 1304', 'rt' => 'RT 2'],
            ['alamat' => 'Jalan Ir. H. Djuanda No. 1405', 'rt' => 'RT 3'],
            ['alamat' => 'Jalan Dr. Setiabudi No. 1506', 'rt' => 'RT 4'],
            ['alamat' => 'Jalan RA Kartini No. 1607', 'rt' => 'RT 5'],
            ['alamat' => 'Jalan WR Supratman No. 1708', 'rt' => 'RT 1'],
        ];

        foreach ($data as $dt) {
            DB::table('alamat')->insert($dt);
        }
    }
}
