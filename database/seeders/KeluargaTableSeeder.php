<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeluargaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['id_warga' => '1', 'noKK' => '3507000000001000', 'jumlah_pekerja' => '2', 'total_pendapatan' => '5000000.00', 'tanggungan' => '3'],
            ['id_warga' => '5', 'noKK' => '3507000000001000', 'jumlah_pekerja' => '1', 'total_pendapatan' => '3000000.00', 'tanggungan' => '2'],
            ['id_warga' => '8', 'noKK' => '3507000000001000', 'jumlah_pekerja' => '3', 'total_pendapatan' => '6500000.00', 'tanggungan' => '4'],
            ['id_warga' => '13', 'noKK' => '3507000000001000', 'jumlah_pekerja' => '1', 'total_pendapatan' => '2500000.00', 'tanggungan' => '3'],
            ['id_warga' => '18', 'noKK' => '3507000000001000', 'jumlah_pekerja' => '2', 'total_pendapatan' => '4200000.00', 'tanggungan' => '5'],
        ];

        DB::table('keluarga')->insert($data);
    }
}
