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
use Illuminate\Support\Facades\Cache;

require_once app_path('Helpers/convertDate.php');

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'active' => 'beranda',
            'totalWarga' => Warga::count(),
            'totalKK' => Keluarga::count(),
            'pengumuman' => Pengumuman::orderBy('id_pengumuman', 'desc')->take(3)->get(),
            'dokumentasi' => Dokumentasi::with('file:id_file,id_dokumentasi,path')->take(5)->get(),
            'umkm' => Umkm::with('file:id_file,id_umkm,path')->take(3)->get(),
            'countRt' => Alamat::selectRaw('rt, count(*) as count')->groupBy('rt')->pluck('count', 'rt'),
            'totalPekerja' => Keluarga::sum('jumlah_pekerja'),
            'gender' => Warga::selectRaw('jenis_kelamin, count(*) as count')->groupBy('jenis_kelamin')->pluck('count', 'jenis_kelamin'),
            'statusNikah' => Status::selectRaw('status_nikah, count(*) as count')->groupBy('status_nikah')->pluck('count', 'status_nikah')
        ];

        return view('dashboard.home', compact('data'));
    }

    public function pengumuman()
    {
        $data = [
            'active' => 'pengumuman',
            'pengumuman' => Pengumuman::orderBy('id_pengumuman', 'desc')->paginate(6)
        ];

        return view('dashboard.pengumuman.index', compact('data'));
    }

    public function showPengumuman(string $id)
    {
        $pengumuman = Pengumuman::with('file:id_file,id_pengumuman,publicId,path,name')->findOrFail($id);
        $formatted = convertDate($pengumuman->tanggal);

        $fileSize = Cache::remember("pengumuman_{$id}_file_size", 60, function () use ($pengumuman) {
            return round(Cloudinary::admin()->asset($pengumuman->file->publicId)['bytes'] / 1024 / 1024, 2);
        });

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
        $dokumentasi = Dokumentasi::with('file:id_file,id_dokumentasi,publicId,path')->findOrFail($id);
        $formatted = convertDate($dokumentasi->tanggal);

        $data = [
            'active' => 'kegiatan',
            'dokumentasi' => $dokumentasi,
            'formatted' => $formatted,
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
        $umkm = Umkm::with('file:id_file,id_umkm,publicId,path')->findOrFail($id);

        $data = [
            'active' => 'umkm',
            'umkm' => $umkm
        ];

        return view('dashboard.umkm.show', compact('data'));
    }
}
