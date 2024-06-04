<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dokumentasi;
use App\Models\Keluarga;
use App\Models\Pengumuman;
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
            'umkm' => Umkm::with('file')->take(3)->get()
        ];

        return view('dashboard.home', compact('data'));
    }
}
