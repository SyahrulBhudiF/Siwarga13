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
            ['id_warga' => 1, 'id_alamat' => 1, 'id_status' => 1, 'noKK' => '1234567890000000', 'nik' => '1234567890000001', 'nama' => 'Budi Santoso', 'ttl' => 'Jakarta, 10 Januari 1980', 'pekerjaan' => 'Pegawai Swasta', 'jenis_kelamin' => 'Laki-laki', 'agama' => 'Islam', 'pendapatan' => '5000000.00'],
            ['id_warga' => 2, 'id_alamat' => 1, 'id_status' => 2, 'noKK' => '1234567890000000', 'nik' => '1234567890000002', 'nama' => 'Ani Cahaya', 'ttl' => 'Bandung, 15 Februari 1995', 'pekerjaan' => 'Mahasiswa', 'jenis_kelamin' => 'Perempuan', 'agama' => 'Islam', 'pendapatan' => '0.00'],
            ['id_warga' => 3, 'id_alamat' => 1, 'id_status' => 3, 'noKK' => '1234567890000000', 'nik' => '1234567890000003', 'nama' => 'Citra Wardhani', 'ttl' => 'Surabaya, 20 Maret 1975', 'pekerjaan' => 'Wiraswasta', 'jenis_kelamin' => 'Perempuan', 'agama' => 'Hindu', 'pendapatan' => '10000000.00'],
            ['id_warga' => 4, 'id_alamat' => 1, 'id_status' => 4, 'noKK' => '1234567890000000', 'nik' => '1234567890000004', 'nama' => 'Dedi Susanto', 'ttl' => 'Medan, 25 April 2000', 'pekerjaan' => 'Pegawai Negeri', 'jenis_kelamin' => 'Laki-laki', 'agama' => 'Islam', 'pendapatan' => '8000000.00'],
            ['id_warga' => 5, 'id_alamat' => 1, 'id_status' => 5, 'noKK' => '1234567890000000', 'nik' => '1234567890000005', 'nama' => 'Eka Putri', 'ttl' => 'Yogyakarta, 30 Mei 2015', 'pekerjaan' => 'Guru', 'jenis_kelamin' => 'Perempuan', 'agama' => 'Islam', 'pendapatan' => '0.00'],
            ['id_warga' => 6, 'id_alamat' => 2, 'id_status' => 6, 'noKK' => '1234567890000020', 'nik' => '1234567890000021', 'nama' => 'Fahmi Rahman', 'ttl' => 'Semarang, 5 Juni 1978', 'pekerjaan' => 'Wiraswasta', 'jenis_kelamin' => 'Laki-laki', 'agama' => 'Islam', 'pendapatan' => '12000000.00'],
            ['id_warga' => 7, 'id_alamat' => 2, 'id_status' => 7, 'noKK' => '1234567890000020', 'nik' => '1234567890000022', 'nama' => 'Gita Wijaya', 'ttl' => 'Denpasar, 10 Juli 1980', 'pekerjaan' => 'Dokter', 'jenis_kelamin' => 'Perempuan', 'agama' => 'Islam', 'pendapatan' => '15000000.00'],
            ['id_warga' => 8, 'id_alamat' => 2, 'id_status' => 8, 'noKK' => '1234567890000020', 'nik' => '1234567890000023', 'nama' => 'Hadi Nugroho', 'ttl' => 'Pontianak, 15 Agustus 1987', 'pekerjaan' => 'PNS', 'jenis_kelamin' => 'Laki-laki', 'agama' => 'Kristen', 'pendapatan' => '7000000.00'],
            ['id_warga' => 9, 'id_alamat' => 2, 'id_status' => 9, 'noKK' => '1234567890000020', 'nik' => '1234567890000024', 'nama' => 'Ina Kusuma', 'ttl' => 'Makassar, 20 September 1995', 'pekerjaan' => 'Wiraswasta', 'jenis_kelamin' => 'Perempuan', 'agama' => 'Islam', 'pendapatan' => '4000000.00'],
            ['id_warga' => 10, 'id_alamat' => 2, 'id_status' => 10, 'noKK' => '1234567890000020', 'nik' => '1234567890000025', 'nama' => 'Joko Santoso', 'ttl' => 'Palembang, 25 Oktober 2001', 'pekerjaan' => 'Pegawai Swasta', 'jenis_kelamin' => 'Laki-laki', 'agama' => 'Hindu', 'pendapatan' => '0.00'],
            ['id_warga' => 11, 'id_alamat' => 3, 'id_status' => 11, 'noKK' => '1234567890000030', 'nik' => '1234567890000031', 'nama' => 'Kiki Wijaya', 'ttl' => 'Surakarta, 30 November 1977', 'pekerjaan' => 'Pengusaha', 'jenis_kelamin' => 'Perempuan', 'agama' => 'Islam', 'pendapatan' => '11000000.00'],
            ['id_warga' => 12, 'id_alamat' => 3, 'id_status' => 12, 'noKK' => '1234567890000030', 'nik' => '1234567890000032', 'nama' => 'Lina Setiawan', 'ttl' => 'Bandar Lampung, 5 Desember 1988', 'pekerjaan' => 'Guru', 'jenis_kelamin' => 'Perempuan', 'agama' => 'Kristen', 'pendapatan' => '7500000.00'],
            ['id_warga' => 13, 'id_alamat' => 3, 'id_status' => 13, 'noKK' => '1234567890000030', 'nik' => '1234567890000033', 'nama' => 'Maman Surono', 'ttl' => 'Jayapura, 10 Januari 1996', 'pekerjaan' => 'Pegawai Negeri', 'jenis_kelamin' => 'Laki-laki', 'agama' => 'Islam', 'pendapatan' => '10000000.00'],
            ['id_warga' => 14, 'id_alamat' => 3, 'id_status' => 14, 'noKK' => '1234567890000030', 'nik' => '1234567890000034', 'nama' => 'Nana Fitriani', 'ttl' => 'Mataram, 15 Februari 1993', 'pekerjaan' => 'Dosen', 'jenis_kelamin' => 'Perempuan', 'agama' => 'Islam', 'pendapatan' => '0.00'],
            ['id_warga' => 15, 'id_alamat' => 3, 'id_status' => 15, 'noKK' => '1234567890000030', 'nik' => '1234567890000035', 'nama' => 'Oscar Manullang', 'ttl' => 'Padang, 20 Maret 2013', 'pekerjaan' => 'Wiraswasta', 'jenis_kelamin' => 'Laki-laki', 'agama' => 'Kristen', 'pendapatan' => '0.00'],
            ['id_warga' => 16, 'id_alamat' => 4, 'id_status' => 16, 'noKK' => '1234567890000040', 'nik' => '1234567890000041', 'nama' => 'Rudi Pratama', 'ttl' => 'Ambon, 30 Mei 1986', 'pekerjaan' => 'PNS', 'jenis_kelamin' => 'Laki-laki', 'agama' => 'Kristen', 'pendapatan' => '8500000.00'],
            ['id_warga' => 17, 'id_alamat' => 4, 'id_status' => 17, 'noKK' => '1234567890000040', 'nik' => '1234567890000042', 'nama' => 'Putri Handayani', 'ttl' => 'Manado, 25 April 1992', 'pekerjaan' => 'Pegawai Swasta', 'jenis_kelamin' => 'Perempuan', 'agama' => 'Islam', 'pendapatan' => '6500000.00'],
            ['id_warga' => 18, 'id_alamat' => 4, 'id_status' => 18, 'noKK' => '1234567890000040', 'nik' => '1234567890000043', 'nama' => 'Siti Rahayu', 'ttl' => 'Banda Aceh, 5 Juni 1990', 'pekerjaan' => 'Wiraswasta', 'jenis_kelamin' => 'Perempuan', 'agama' => 'Islam', 'pendapatan' => '12000000.00'],
            ['id_warga' => 19, 'id_alamat' => 4, 'id_status' => 19, 'noKK' => '1234567890000040', 'nik' => '1234567890000044', 'nama' => 'Tono Sutrisno', 'ttl' => 'Banjarmasin, 10 Juli 1990', 'pekerjaan' => 'Dokter', 'jenis_kelamin' => 'Laki-laki', 'agama' => 'Kristen', 'pendapatan' => '15000000.00'],
            ['id_warga' => 20, 'id_alamat' => 4, 'id_status' => 20, 'noKK' => '1234567890000040', 'nik' => '1234567890000045', 'nama' => 'Uci Nurhayati', 'ttl' => 'Balikpapan, 15 Agustus 1997', 'pekerjaan' => 'Pengusaha', 'jenis_kelamin' => 'Perempuan', 'agama' => 'Islam', 'pendapatan' => '11000000.00']
        ];

        foreach ($data as $dt) {
            DB::table('warga')->insert($dt);
        }
    }
}
