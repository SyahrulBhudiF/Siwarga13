<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['status_nikah' => 'Kawin', 'status_peran' => 'Kepala keluarga', 'status_hidup' => 'Hidup'],
            ['status_nikah' => 'Kawin', 'status_peran' => 'Anggota keluarga', 'status_hidup' => 'Hidup'],
            ['status_nikah' => 'Cerai Hidup', 'status_peran' => 'Anggota keluarga', 'status_hidup' => 'Hidup'],
            ['status_nikah' => 'Belum Kawin', 'status_peran' => 'Anggota keluarga', 'status_hidup' => 'Hidup'],
            ['status_nikah' => 'Belum Kawin', 'status_peran' => 'Anggota keluarga', 'status_hidup' => 'Hidup'],
            ['status_nikah' => 'Kawin', 'status_peran' => 'Kepala keluarga', 'status_hidup' => 'Hidup'],
            ['status_nikah' => 'Kawin', 'status_peran' => 'Anggota keluarga', 'status_hidup' => 'Hidup'],
            ['status_nikah' => 'Cerai Mati', 'status_peran' => 'Anggota keluarga', 'status_hidup' => 'Hidup'],
            ['status_nikah' => 'Belum Kawin', 'status_peran' => 'Anggota keluarga', 'status_hidup' => 'Hidup'],
            ['status_nikah' => 'Belum Kawin', 'status_peran' => 'Anggota keluarga', 'status_hidup' => 'Pindah'],
            ['status_nikah' => 'Kawin', 'status_peran' => 'Kepala keluarga', 'status_hidup' => 'Hidup'],
            ['status_nikah' => 'Kawin', 'status_peran' => 'Anggota keluarga', 'status_hidup' => 'Hidup'],
            ['status_nikah' => 'Belum Kawin', 'status_peran' => 'Anggota keluarga', 'status_hidup' => 'Hidup'],
            ['status_nikah' => 'Belum Kawin', 'status_peran' => 'Anggota keluarga', 'status_hidup' => 'Meninggal'],
            ['status_nikah' => 'Belum Kawin', 'status_peran' => 'Anggota keluarga', 'status_hidup' => 'Hidup'],
            ['status_nikah' => 'Kawin', 'status_peran' => 'Kepala keluarga', 'status_hidup' => 'Hidup'],
            ['status_nikah' => 'Kawin', 'status_peran' => 'Anggota keluarga', 'status_hidup' => 'Hidup'],
            ['status_nikah' => 'Kawin', 'status_peran' => 'Anggota keluarga', 'status_hidup' => 'Hidup'],
            ['status_nikah' => 'Kawin', 'status_peran' => 'Anggota keluarga', 'status_hidup' => 'Hidup'],
            ['status_nikah' => 'Belum Kawin', 'status_peran' => 'Anggota keluarga', 'status_hidup' => 'Hidup'],
        ];

        foreach ($data as $dt) {
            DB::table('status')->insert($dt);
        }
    }
}
