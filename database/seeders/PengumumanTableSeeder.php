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
                'judul' => 'Kerja Bakti Lingkungan RW 13',
                'tanggal' => '20 Mei 2024',
                'nomor' => '001/RW13/2024',
                'perihal' => 'Kerja Bakti',
                'kepada' => 'Seluruh Warga RW 13',
                'path_thumbnail' => '',
                'penerbit' => 'Ketua RW',
                'content' => 'Dengan ini diberitahukan kepada seluruh warga RW 13 bahwa pada hari Minggu, tanggal 1 Juni 2024, akan diadakan kerja bakti untuk membersihkan lingkungan sekitar. Diharapkan partisipasi aktif dari seluruh warga untuk hadir pada pukul 07.00 WIB di balai RW. Peralatan kebersihan harap dibawa masing-masing.'
            ],
            [
                'judul' => 'Kegiatan Posyandu RW 13',
                'tanggal' => '21 Mei 2024',
                'nomor' => '002/RW13/2024',
                'perihal' => 'Posyandu Bulanan',
                'kepada' => 'Ibu-ibu dan Balita RW 13',
                'path_thumbnail' => '',
                'penerbit' => 'Ketua RW',
                'content' => 'Dengan ini diberitahukan kepada ibu-ibu dan balita RW 13 bahwa pada hari Rabu, tanggal 5 Juni 2024, akan diadakan kegiatan posyandu bulanan. Kegiatan ini akan dilaksanakan di balai RW mulai pukul 08.00 WIB. Diharapkan kehadiran ibu-ibu dan balita untuk pemeriksaan kesehatan rutin dan pemberian vitamin.'
            ],
            [
                'judul' => 'Pertemuan Rutin PKK RW 13',
                'tanggal' => '22 Mei 2024',
                'nomor' => '003/RW13/2024',
                'perihal' => 'Pertemuan Rutin PKK',
                'kepada' => 'Anggota PKK RW 13',
                'path_thumbnail' => '',
                'penerbit' => 'Ketua RW',
                'content' => 'Dengan ini diberitahukan kepada seluruh anggota PKK RW 13 bahwa pertemuan rutin akan diadakan pada hari Senin, tanggal 10 Juni 2024, di balai RW pukul 15.00 WIB. Agenda pertemuan meliputi evaluasi kegiatan bulan lalu dan perencanaan kegiatan bulan depan. Kehadiran ibu-ibu sangat diharapkan.'
            ],
            [
                'judul' => 'Lomba Kebersihan Antar RT RW 13',
                'tanggal' => '23 Mei 2024',
                'nomor' => '004/RW13/2024',
                'perihal' => 'Lomba Kebersihan',
                'kepada' => 'Seluruh RT di RW 13',
                'path_thumbnail' => '',
                'penerbit' => 'Ketua RW',
                'content' => 'Dengan ini diberitahukan kepada seluruh RT di RW 13 bahwa akan diadakan lomba kebersihan antar RT pada hari Sabtu, tanggal 15 Juni 2024. Penilaian akan dimulai pukul 09.00 WIB. Diharapkan partisipasi aktif dari seluruh warga untuk mempersiapkan lingkungan masing-masing. Pemenang akan mendapatkan hadiah menarik.'
            ],
            [
                'judul' => 'Senam Pagi Bersama RW 13',
                'tanggal' => '24 Mei 2024',
                'nomor' => '005/RW13/2024',
                'perihal' => 'Senam Pagi',
                'kepada' => 'Seluruh Warga RW 13',
                'path_thumbnail' => '',
                'penerbit' => 'Ketua RW',
                'content' => 'Dengan ini diberitahukan kepada seluruh warga RW 13 bahwa akan diadakan senam pagi bersama pada hari Kamis, tanggal 20 Juni 2024, di lapangan RW 05 pukul 06.00 WIB. Diharapkan kehadiran seluruh warga untuk berpartisipasi dalam kegiatan ini demi kesehatan dan kebugaran bersama.'
            ]
        ];

        DB::table('pengumuman')->insert($data);
    }
}
