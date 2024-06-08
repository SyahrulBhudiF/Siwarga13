<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Alamat;
use App\Models\Dokumentasi;
use App\Models\Keluarga;
use App\Models\Pengumuman;
use App\Models\Status;
use App\Models\Umkm;
use App\Models\Warga;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'active' => 'beranda',
            'totalWarga' => Warga::count(),
            'totalKK' => Keluarga::count(),
            'pengumuman' => Pengumuman::orderBy('created_at', 'desc')->take(3)->get(),
            'dokumentasi' => Dokumentasi::with('file')->take(5)->get(),
            'umkm' => Umkm::with('file')->take(3)->get(),
            'countRt' => [
                'rt1' => Alamat::where('rt', 'RT 1')->count(),
                'rt2' => Alamat::where('rt', 'RT 2')->count(),
                'rt3' => Alamat::where('rt', 'RT 3')->count(),
                'rt4' => Alamat::where('rt', 'RT 4')->count(),
                'rt5' => Alamat::where('rt', 'RT 5')->count(),
            ],
            'totalPekerja' => Keluarga::sum('jumlah_pekerja'),
            'gender' => [
                'l' => Warga::where('jenis_kelamin', 'Laki-laki')->count(),
                'p' => Warga::where('jenis_kelamin', 'Perempuan')->count(),
            ],
            'statusNikah' => [
                'kawin' => Status::where('status_nikah', 'Kawin')->count(),
                'belum' => Status::where('status_nikah', 'Belum Kawin')->count(),
                'cerai_mati' => Status::where('status_nikah', 'Cerai Mati')->count(),
                'cerai_hidup' => Status::where('status_nikah', 'Cerai Hidup')->count(),
            ]
        ];

        return view('dashboard.home', compact('data'));
    }

    public function pengumuman()
    {
        $data = [
            'active' => 'pengumuman',
            'pengumuman' => Pengumuman::orderBy('created_at', 'desc')->paginate(6)
        ];

        return view('dashboard.pengumuman.index', compact('data'));
    }

    public function dokumentasi()
    {
        $data = [
            'active' => 'kegiatan',
            'dokumentasi' => Dokumentasi::with('file')->paginate(6)
        ];

        return view('dashboard.kegiatan.index', compact('data'));
    }

    public function umkm()
    {
        $data = [
            'active' => 'umkm',
            'umkm' => Umkm::with('file')->paginate(6)
        ];

        return view('dashboard.umkm.index', compact('data'));
    }
}
