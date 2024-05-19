<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WargaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['id_warga' => 1, 'id_alamat' => 1, 'id_status' => 1, 'noKK' => '3507000000001000', 'nik' => '3507000000010001', 'nama' => 'Budi Santoso', 'ttl' => 'Malang, 10 Januari 1990', 'pekerjaan' => 'Pegawai Swasta', 'jenis_kelamin' => 'Laki-laki', 'agama' => 'Islam', 'pendapatan' => '3500000.00'],
            ['id_warga' => 2, 'id_alamat' => 2, 'id_status' => 2, 'noKK' => '3507000000001000', 'nik' => '3507000000010002', 'nama' => 'Herlina Mawar', 'ttl' => 'Malang, 7 Agustus 1993', 'pekerjaan' => 'Penata Rias', 'jenis_kelamin' => 'Perempuan', 'agama' => 'Islam', 'pendapatan' => '1500000.0'],
            ['id_warga' => 3, 'id_alamat' => 3, 'id_status' => 3, 'noKK' => '3507000000001000', 'nik' => '3507000000010003', 'nama' => 'Vito Maulana', 'ttl' => 'Malang, 23 Februari 2020', 'pekerjaan' => 'Belum/Tidak Bekerja', 'jenis_kelamin' => 'Laki-laki', 'agama' => 'Islam', 'pendapatan' => '0.0'],
            ['id_warga' => 4, 'id_alamat' => 4, 'id_status' => 4, 'noKK' => '3507000000001000', 'nik' => '3507000000010004', 'nama' => 'Suliastri', 'ttl' => 'Malang, 5 Maret 1970', 'pekerjaan' => 'Belum/Tidak Bekerja', 'jenis_kelamin' => 'Perempuan', 'agama' => 'Islam', 'pendapatan' => '0.0'],

            ['id_warga' => 5, 'id_alamat' => 5, 'id_status' => 5, 'noKK' => '3507000000002000', 'nik' => '3507000000002001', 'nama' => 'Siti Aminah', 'ttl' => 'Malang, 5 Februari 1985', 'pekerjaan' => 'Guru', 'jenis_kelamin' => 'Perempuan', 'agama' => 'Kristen', 'pendapatan' => '3000000.00'],
            ['id_warga' => 6, 'id_alamat' => 6, 'id_status' => 6, 'noKK' => '3507000000002000', 'nik' => '3507000000002002', 'nama' => 'Fauzan Sigit', 'ttl' => 'Malang, 15 Juli 2018', 'pekerjaan' => 'Belum/Tidak Bekerja', 'jenis_kelamin' => 'Laki-laki', 'agama' => 'Kristen', 'pendapatan' => '0.00'],
            ['id_warga' => 7, 'id_alamat' => 7, 'id_status' => 7, 'noKK' => '3507000000002000', 'nik' => '3507000000002003', 'nama' => 'Fauzi Sigit', 'ttl' => 'Malang, 15 Juli 2018', 'pekerjaan' => 'Belum/Tidak Bekerja', 'jenis_kelamin' => 'Perempuan', 'agama' => 'Kristen', 'pendapatan' => '0.00'],

            ['id_warga' => 8, 'id_alamat' => 8, 'id_status' => 8, 'noKK' => '3507000000003000', 'nik' => '3507000000003001', 'nama' => 'Ahmad Fauzi', 'ttl' => 'Malang, 20 Maret 1975', 'pekerjaan' => 'Wiraswasta', 'jenis_kelamin' => 'Laki-laki', 'agama' => 'Islam', 'pendapatan' => '3500000.00'],
            ['id_warga' => 9, 'id_alamat' => 9, 'id_status' => 9, 'noKK' => '3507000000003000', 'nik' => '3507000000003002', 'nama' => 'Rini Anggraini', 'ttl' => 'Malang, 17 Juni 1976', 'pekerjaan' => 'Pembantu Rumah Tangga', 'jenis_kelamin' => 'Perempuan', 'agama' => 'Islam', 'pendapatan' => '2000000.00'],
            ['id_warga' => 10, 'id_alamat' => 10, 'id_status' => 10, 'noKK' => '3507000000003000', 'nik' => '3507000000003003', 'nama' => 'Ryan Fauzi', 'ttl' => 'Malang, 9 Agustus 1997', 'pekerjaan' => 'Tukang Cukur', 'jenis_kelamin' => 'Laki-laki', 'agama' => 'Islam', 'pendapatan' => '1000000.00'],
            ['id_warga' => 11, 'id_alamat' => 11, 'id_status' => 11, 'noKK' => '3507000000003000', 'nik' => '3507000000003004', 'nama' => 'Dany Fauzi', 'ttl' => 'Malang, 8 September 2004', 'pekerjaan' => 'Belum/Tidak Bekerja', 'jenis_kelamin' => 'Laki-laki', 'agama' => 'Islam', 'pendapatan' => '0.00'],
            ['id_warga' => 12, 'id_alamat' => 12, 'id_status' => 12, 'noKK' => '3507000000003000', 'nik' => '3507000000003005', 'nama' => 'Debby Fauzi', 'ttl' => 'Malang, 3 Oktober 2008', 'pekerjaan' => 'Belum/Tidak Bekerja', 'jenis_kelamin' => 'Perempuan', 'agama' => 'Islam', 'pendapatan' => '0.00'],

            ['id_warga' => 13, 'id_alamat' => 13, 'id_status' => 13, 'noKK' => '3507000000004000', 'nik' => '3507000000004001', 'nama' => 'Lestari Dewi', 'ttl' => 'Malang, 3 Mei 1990', 'pekerjaan' => 'Pembantu Rumah Tangga', 'jenis_kelamin' => 'Perempuan', 'agama' => 'Islam', 'pendapatan' => '2500000.00'],
            ['id_warga' => 14, 'id_alamat' => 14, 'id_status' => 14, 'noKK' => '3507000000004000', 'nik' => '3507000000004002', 'nama' => 'Kurnia', 'ttl' => 'Malang, 31 Juni 1966', 'pekerjaan' => 'Belum/Tidak Bekerja', 'jenis_kelamin' => 'Perempuan', 'agama' => 'Islam', 'pendapatan' => '0.00'],
            ['id_warga' => 15, 'id_alamat' => 15, 'id_status' => 15, 'noKK' => '3507000000004000', 'nik' => '3507000000004003', 'nama' => 'Ajeng', 'ttl' => 'Malang, 24 November 1947', 'pekerjaan' => 'Belum/Tidak Bekerja', 'jenis_kelamin' => 'Perempuan', 'agama' => 'Islam', 'pendapatan' => '0.00'],
            ['id_warga' => 16, 'id_alamat' => 16, 'id_status' => 16, 'noKK' => '3507000000004000', 'nik' => '3507000000004004', 'nama' => 'Natasya Dewi', 'ttl' => 'Malang, 7 Desember 2014', 'pekerjaan' => 'Belum/Tidak Bekerja', 'jenis_kelamin' => 'Perempuan', 'agama' => 'Islam', 'pendapatan' => '0.00'],
            ['id_warga' => 17, 'id_alamat' => 17, 'id_status' => 17, 'noKK' => '3507000000004000', 'nik' => '3507000000004005', 'nama' => 'Raisa Dewi', 'ttl' => 'Malang, 8 Mei Januari 2023', 'pekerjaan' => 'Belum/Tidak Bekerja', 'jenis_kelamin' => 'Perempuan', 'agama' => 'Islam', 'pendapatan' => '0.00'],

            ['id_warga' => 18, 'id_alamat' => 18, 'id_status' => 18, 'noKK' => '3507000000005000', 'nik' => '3507000000005001', 'nama' => 'Agus Sutrisno', 'ttl' => 'Malang, 15 Agustus 1982', 'pekerjaan' => 'Guru', 'jenis_kelamin' => 'Laki-laki', 'agama' => 'Islam', 'pendapatan' => '3200000.00'],
            ['id_warga' => 19, 'id_alamat' => 19, 'id_status' => 19, 'noKK' => '3507000000005000', 'nik' => '3507000000005002', 'nama' => 'Diva Rahmawati', 'ttl' => 'Malang, 20 Februari 1982', 'pekerjaan' => 'Wiraswasta', 'jenis_kelamin' => 'Perempuan', 'agama' => 'Islam', 'pendapatan' => '1000000.00'],
            ['id_warga' => 20, 'id_alamat' => 20, 'id_status' => 20, 'noKK' => '3507000000005000', 'nik' => '3507000000005003', 'nama' => 'Salim', 'ttl' => 'Malang, 22 Maret 1944', 'pekerjaan' => 'Belum/Tidak Bekerja', 'jenis_kelamin' => 'Laki-laki', 'agama' => 'Islam', 'pendapatan' => '0.00'],
            ['id_warga' => 21, 'id_alamat' => 21, 'id_status' => 21, 'noKK' => '3507000000005000', 'nik' => '3507000000005004', 'nama' => 'Nur', 'ttl' => 'Malang, 3 April 1945', 'pekerjaan' => 'Belum/Tidak Bekerja', 'jenis_kelamin' => 'Perempuan', 'agama' => 'Islam', 'pendapatan' => '0.00'],
            ['id_warga' => 22, 'id_alamat' => 22, 'id_status' => 22, 'noKK' => '3507000000005000', 'nik' => '3507000000005005', 'nama' => 'Angelia Agnes', 'ttl' => 'Malang, 4 April 2012', 'pekerjaan' => 'Belum/Tidak Bekerja', 'jenis_kelamin' => 'Perempuan', 'agama' => 'Islam', 'pendapatan' => '0.00'],
            ['id_warga' => 23, 'id_alamat' => 23, 'id_status' => 23, 'noKK' => '3507000000005000', 'nik' => '3507000000005006', 'nama' => 'Nathaniel Haris', 'ttl' => 'Malang, 5 Mei 2016', 'pekerjaan' => 'Belum/Tidak Bekerja', 'jenis_kelamin' => 'Laki-laki', 'agama' => 'Islam', 'pendapatan' => '0.00'],
        ];

        foreach ($data as $dt) {
            DB::table('warga')->insert($dt);
        }
    }
}
