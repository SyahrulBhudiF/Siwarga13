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
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;

require_once app_path('Helpers/convertDate.php');

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

    public function showPengumuman(string $id)
    {
        $pengumuman = Pengumuman::with('file')->find($id);
        $formatted = convertDate($pengumuman->tanggal);

        $fileSize = round(Cloudinary::admin()->asset($pengumuman->file->publicId)['bytes'] / 1024 / 1024, 2);

        $data = [
            'active' => 'pengumuman',
            'pengumuman' => $pengumuman,
            'formatted' => $formatted,
            'fileSize' => $fileSize
        ];

        return view('dashboard.pengumuman.show', compact('data'));
    }

    public function dokumentasi()
    {
        $data = [
            'active' => 'kegiatan',
            'dokumentasi' => Dokumentasi::with('file')->paginate(6)
        ];

        return view('dashboard.kegiatan.index', compact('data'));
    }

    public function showDokumentasi(string $id)
    {
        $data = [
            'active' => 'kegiatan',
            'dokumentasi' => Dokumentasi::with('file')->find($id)
        ];

        return view('dashboard.kegiatan.show', compact('data'));
    }

    public function umkm()
    {
        $data = [
            'active' => 'umkm',
            'umkm' => Umkm::with('file')->paginate(6)
        ];

        return view('dashboard.umkm.index', compact('data'));
    }

    public function showUmkm(string $id)
    {
        $data = [
            'active' => 'umkm',
            'umkm' => Umkm::with('file')->find($id)
        ];

        return view('dashboard.umkm.show', compact('data'));
    }
}
