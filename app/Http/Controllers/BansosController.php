<?php

namespace App\Http\Controllers;

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

        return view('pages.bansos.index', compact('data'));
    }
}
