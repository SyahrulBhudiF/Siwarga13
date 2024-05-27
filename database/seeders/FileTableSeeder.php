<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'path' => 'https://res.cloudinary.com/du3kemir5/image/upload/v1716741087/pdf/qbpsqtxyidp0n1segaj3.pdf',
                'publicId' => 'pdf/qbpsqtxyidp0n1segaj3',
                'type' => 'pengumuman',
                'name' => 'surat-pegantar-rt-rw-11027.pdf',
                'id_pengumuman' => 1
            ],
            [
                'path' => 'https://res.cloudinary.com/du3kemir5/image/upload/v1716741195/pdf/ivtehaioevapjkxjbjk1.pdf',
                'publicId' => 'pdf/ivtehaioevapjkxjbjk1',
                'type' => 'pengumuman',
                'name' => 'surat-pegantar-rt-rw-11027.pdf',
                'id_pengumuman' => 2
            ]
        ];

        DB::table('file')->insert($data);
    }
}
