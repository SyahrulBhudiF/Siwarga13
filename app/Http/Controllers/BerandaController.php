<?php

namespace App\Http\Controllers;

use App\Models\Keluarga;
use App\Models\Warga;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Beranda',
            'active' => 'beranda',
            'jumlah_warga' => Warga::count(),
            'jumlah_kk' => Keluarga::count(),
        ];

        return view('pages.beranda.index', compact('data'));
    }
}
