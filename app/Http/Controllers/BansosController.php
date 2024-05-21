<?php

namespace App\Http\Controllers;

use App\Models\Edas;
use App\Models\Keluarga;
use App\Models\RankEdas;
use App\Models\RankMabac;
use App\Models\Warga;
use App\Services\EdasService;
use App\Services\MabacService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

require_once(app_path() . '/Helpers/convertTTL.php');
require_once(app_path() . '/Helpers/decisionMatrix.php');

class BansosController extends Controller
{
    private EdasService $edasService;
    private MabacService $mabacService;

    public function __construct(EdasService $edasService, MabacService $mabacService)
    {
        $this->edasService = $edasService;
        $this->mabacService = $mabacService;
    }

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

    public function edas(): RedirectResponse
    {
        try {
            Edas::truncate();

            $data = Keluarga::all();
            $decisionMatrix = decisionMatrix($data);
            $average = $this->edasService->average($decisionMatrix);
            $pda = $this->edasService->calc($decisionMatrix, $average, true);
            $nda = $this->edasService->calc($decisionMatrix, $average, false);
            $sp = $this->edasService->SPSN($pda);
            $sn = $this->edasService->SPSN($nda);
            $nsn = $this->edasService->NSPNSN($sn, false);
            $nsp = $this->edasService->NSPNSN($sp, true);
            $as = $this->edasService->AS($nsp, $nsn);

            Edas::insert([
                'decision_matrix' => json_encode($decisionMatrix),
                'average' => json_encode($average),
                'pda' => json_encode($pda),
                'nda' => json_encode($nda),
                'sp' => json_encode($sp),
                'sn' => json_encode($sn),
                'nsn' => json_encode($nsn),
                'nsp' => json_encode($nsp),
            ]);

            return redirect('/bansos')->with('success', 'Data untuk EDAS berhasil dihitung.');

        } catch (\Exception $e) {
            return redirect('/bansos')->with('error', 'Data untuk EDAS gagal dihitung.');
        }

    }

    public function mabac()
    {
        $data = Keluarga::all();
//        dd($data->toArray());
        $decisionMatrix = decisionMatrix($data);
        dd($decisionMatrix);
    }
}
