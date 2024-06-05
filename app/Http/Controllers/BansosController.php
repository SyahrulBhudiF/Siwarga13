<?php

namespace App\Http\Controllers;

use App\Models\Edas;
use App\Models\Keluarga;
use App\Models\Mabac;
use App\Models\RankEdas;
use App\Models\RankMabac;
use App\Models\Warga;
use App\Services\EdasService;
use App\Services\MabacService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

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

    /**
     * Display a listing of the resource.
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $data = [
            'title' => 'Bansos',
            'active' => 'bansos',
            'head' => 'List Bantuan Sosial RW 13',
            'desc' => 'Berikut adalah data warga yang berhak menerima bansos.',
            'method' => 'edas',
        ];

        $listData = RankEdas::with('keluarga')->orderBy('score', 'desc')->paginate(6);

        return view('pages.bansos.index', compact('data', 'listData'));
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\View\View
     */
    public function getMabac(): View
    {
        $data = [
            'title' => 'Bansos',
            'active' => 'bansos',
            'head' => 'List Bantuan Sosial RW 13',
            'desc' => 'Berikut adalah data warga yang berhak menerima bansos . ',
            'method' => 'mabac',
        ];

        $listData = RankMabac::with('keluarga')->orderBy('score', 'desc')->paginate(6);

        return view('pages.bansos.index', compact('data', 'listData'));
    }

    /**
     * Show the same noKK civilliant.
     * @param string $id
     * @return \Illuminate\View\View
     */
    public function show(string $id): View
    {
        $data = [
            'title' => 'Bansos',
            'active' => 'bansos',
        ];

        $warga = Warga::with('alamat')
            ->where('noKK', Keluarga::where('id_keluarga', $id)
                ->first()
                ->noKK)
            ->orderBy('nik', 'asc')
            ->get();

        return view('pages.bansos.detail', compact('data', 'warga'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param string $id
     * @return \Illuminate\View\View
     */
    public function edit(string $id): View
    {
        $data = [
            'title' => 'Bansos',
            'active' => 'bansos',
            'head' => 'Ubah Data Warga',
        ];

        $warga = Warga::with('alamat', 'status')->orderBy('noKK', 'asc')->find($id);
        $warga = convertTTL($warga);

        session()->put('last_route', Route::currentRouteName());

        return view('pages.bansos.edit', compact('data', 'warga'));
    }

    /**
     * Implement Edas Method.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edas(): RedirectResponse
    {
        $data = Keluarga::all();

        try {
            Edas::truncate();
            RankEdas::truncate();

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

            foreach ($as as $key => $value) {
                RankEdas::create([
                    'id_keluarga' => $data[$key]->id_keluarga,
                    'score' => $value,
                ]);
            }

            return redirect('/bansos')->with('success', 'Data EDAS berhasil dihitung . ');
        } catch (\Exception $e) {
            return redirect('/bansos')->with('error', 'Data EDAS gagal dihitung . ');
        }
    }

    /**
     * Implement Mabac Method.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function mabac(): RedirectResponse
    {
        $data = Keluarga::all();

        try {
            Mabac::truncate();
            RankMabac::truncate();

            $decisionMatrix = decisionMatrix($data);
            $min = $this->mabacService->minMax($decisionMatrix, 'min');
            $max = $this->mabacService->minMax($decisionMatrix, 'max');
            $normalizedX = $this->mabacService->normalized($decisionMatrix, $min, $max);
            $weightV = $this->mabacService->weightV($normalizedX);
            $limitsG = $this->mabacService->limitsG($weightV);
            $distanceQ = $this->mabacService->distanceQ($weightV, $limitsG);
            $rankS = $this->mabacService->rankS($distanceQ);

            Mabac::insert([
                'decision_matrix' => json_encode($decisionMatrix),
                'min' => json_encode($min),
                'max' => json_encode($max),
                'normalizedX' => json_encode($normalizedX),
                'weightV' => json_encode($weightV),
                'limitsG' => json_encode($limitsG),
                'distanceQ' => json_encode($distanceQ),
            ]);

            foreach ($rankS as $key => $value) {
                RankMabac::create([
                    'id_keluarga' => $data[$key]->id_keluarga,
                    'score' => $value,
                ]);
            }

            return redirect('/bansos/mabac/show')->with('success', 'Data MABAC berhasil dihitung . ');
        } catch (\Exception $e) {
            return redirect('/bansos/mabac/show')->with('error', 'Data MABAC gagal dihitung . ');
        }
    }

    /**
     * Check step EDAS Method.
     * @return \Illuminate\View\View
     */
    public function checkEdas(): View
    {
        $data = [
            'title' => 'Bansos',
            'active' => 'bansos',
            'head' => 'Checkstep Edas',
            'desc' => 'Berikut adalah step perhitungan dari metode EDAS . ',
        ];

        $keluarga = Keluarga::with('warga')->get();
        $rankEdas = RankEdas::with('keluarga')->orderBy('score', 'desc')->get();
        $edas = Edas::all();

        $matrix = json_decode($edas[0]['decision_matrix']);
        $average = json_decode($edas[0]['average'], true);
        $pda = json_decode($edas[0]['pda'], true);
        $nda = json_decode($edas[0]['nda'], true);
        $sp = json_decode($edas[0]['sp'], true);
        $sn = json_decode($edas[0]['sn'], true);
        $nsn = json_decode($edas[0]['nsn'], true);
        $nsp = json_decode($edas[0]['nsp'], true);

        return view('pages.bansos.edas', compact('data', 'keluarga', 'matrix', 'average', 'pda', 'nda', 'sp', 'sn', 'nsn', 'nsp', 'rankEdas'));
    }

    /**
     * Check step MABAC Method.
     * @return \Illuminate\View\View
     */
    public function checkMabac(): View
    {
        $data = [
            'title' => 'Bansos',
            'active' => 'bansos',
            'head' => 'Checkstep Mabac',
            'desc' => 'Berikut adalah step perhitungan dari metode MABAC . ',
        ];

        $keluarga = Keluarga::with('warga')->get();
        $mabac = Mabac::all();
        $rankMabac = RankMabac::with('keluarga')->orderBy('score', 'desc')->get();

        $matrix = json_decode($mabac[0]['decision_matrix']);
        $min = json_decode($mabac[0]['min'], true);
        $max = json_decode($mabac[0]['max'], true);
        $normalizedX = json_decode($mabac[0]['normalizedX'], true);
        $weightV = json_decode($mabac[0]['weightV'], true);
        $limitsG = json_decode($mabac[0]['limitsG'], true);
        $distanceQ = json_decode($mabac[0]['distanceQ'], true);

        return view('pages.bansos.mabac', compact('data', 'keluarga', 'matrix', 'rankMabac', 'min', 'max', 'normalizedX', 'weightV', 'limitsG', 'distanceQ'));
    }
}
