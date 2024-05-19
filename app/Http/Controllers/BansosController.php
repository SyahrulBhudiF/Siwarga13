<?php

namespace App\Http\Controllers;

use App\Models\Keluarga;
use App\Models\RankEdas;
use App\Models\RankMabac;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

require_once(app_path() . '/Helpers/convertTTL.php');

class BansosController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Bansos',
            'active' => 'bansos',
            'menu' => 'index',
            'head' => 'List Bantuan Sosial RW 13',
            'desc' => 'Berikut adalah data warga yang berhak menerima bansos.',
        ];

        $edas = RankEdas::with('keluarga')->orderBy('score', 'desc')->paginate(6);
        $mabac = RankMabac::with('keluarga')->orderBy('score', 'desc')->paginate(6);

        return view('pages.bansos.index', compact('data', 'edas', 'mabac'));
    }

    public function show(string $id)
    {
        $data = [
            'title' => 'Bansos',
            'active' => 'bansos',
            'menu' => 'index',
        ];

        $warga = Warga::with('alamat')
            ->where('noKK', Keluarga::where('id_keluarga', $id)
                ->first()
                ->noKK)
            ->orderBy('nik', 'asc')
            ->get();

        return view('pages.bansos.detail', compact('data', 'warga'));
    }

    public function edit(string $id)
    {
        $data = [
            'title' => 'Bansos',
            'active' => 'bansos',
            'menu' => 'edit',
            'head' => 'Ubah Data Warga',
        ];

        $warga = Warga::with('alamat', 'status')->orderBy('noKK', 'asc')->find($id);
        $warga = convertTTL($warga);

        session()->put('last_route', Route::currentRouteName());

        return view('pages.bansos.edit', compact('data', 'warga'));
    }
}
