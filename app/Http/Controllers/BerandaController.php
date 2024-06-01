<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use App\Models\Keluarga;
use App\Models\Warga;

class BerandaController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Beranda',
            'active' => 'beranda',
            'jumlah_warga' => Warga::count(),
            'jumlah_kk' => Keluarga::count(),
            'countRt' => [
                'rt1' => Alamat::where('rt', 'RT 1')->count(),
                'rt2' => Alamat::where('rt', 'RT 2')->count(),
                'rt3' => Alamat::where('rt', 'RT 3')->count(),
                'rt4' => Alamat::where('rt', 'RT 4')->count(),
                'rt5' => Alamat::where('rt', 'RT 5')->count(),
            ],
            'gender' => [
                'l' => Warga::where('jenis_kelamin', 'Laki-laki')->count(),
                'p' => Warga::where('jenis_kelamin', 'Perempuan')->count(),
            ],
        ];

        return view('pages.beranda.index', compact('data'));
    }
}
