<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengumumanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'judul' => 'Kegiatan Posyandu RW 13',
                'tanggal' => '21 Mei 2024',
                'nomor' => '002/RW13/2024',
                'perihal' => 'Posyandu Bulanan',
                'kepada' => 'Ibu-ibu dan Balita RW 13',
                'path_thumbnail' => 'https://res.cloudinary.com/du3kemir5/image/upload/v1716741091/thumbnail/zx8eyngfat0dyvfz0z0x.jpg',
                'publicId' => 'thumbnail/zx8eyngfat0dyvfz0z0x',
                'penerbit' => 'Ketua RW',
                'content' => 'Dengan ini diberitahukan kepada ibu-ibu dan balita RW 13 bahwa pada hari Rabu, tanggal 5 Juni 2024, akan diadakan kegiatan posyandu bulanan. Kegiatan ini akan dilaksanakan di balai RW mulai pukul 08.00 WIB. Diharapkan kehadiran ibu-ibu dan balita untuk pemeriksaan kesehatan rutin dan pemberian vitamin.'
            ],
            [
                'judul' => 'Pertemuan Rutin PKK RW 13',
                'tanggal' => '22 Mei 2024',
                'nomor' => '003/RW13/2024',
                'perihal' => 'Pertemuan Rutin PKK',
                'kepada' => 'Anggota PKK RW 13',
                'path_thumbnail' => 'https://res.cloudinary.com/du3kemir5/image/upload/v1716741200/thumbnail/f6wdtllskd8xgzyufrmw.jpg',
                'publicId' => 'thumbnail/f6wdtllskd8xgzyufrmw',
                'penerbit' => 'Ketua RW',
                'content' => 'Dengan ini diberitahukan kepada seluruh anggota PKK RW 13 bahwa pertemuan rutin akan diadakan pada hari Senin, tanggal 10 Juni 2024, di balai RW pukul 15.00 WIB. Agenda pertemuan meliputi evaluasi kegiatan bulan lalu dan perencanaan kegiatan bulan depan. Kehadiran ibu-ibu sangat diharapkan.'
            ],
        ];

        DB::table('pengumuman')->insert($data);
    }
}
