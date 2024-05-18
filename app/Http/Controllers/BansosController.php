<?php

namespace App\Http\Controllers;

use App\Models\RankEdas;
use App\Models\RankMabac;
use Illuminate\Http\Request;

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
}
