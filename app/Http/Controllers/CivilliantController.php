<?php

namespace App\Http\Controllers;

use App\Http\Requests\alamat\StoreAlamatRequest;
use App\Http\Requests\alamat\UpdateAlamatRequest;
use App\Http\Requests\civilliant\StoreCivilliantRequest;
use App\Http\Requests\civilliant\UpdateCivilliantRequest;
use App\Http\Requests\status\StoreStatusRequest;
use App\Http\Requests\status\UpdateStatusRequest;
use App\Models\Alamat;
use App\Models\Keluarga;
use App\Models\Status;
use App\Models\Warga;
use App\Services\CivilliantService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

require_once(app_path() . '/Helpers/convertTTL.php');

class CivilliantController extends Controller
{
    private CivilliantService $civilliantService;

    public function __construct(CivilliantService $civilliantService)
    {
        $this->civilliantService = $civilliantService;
    }

    /**
     * @param Request $request
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $userRole = Auth::user()->role;

        $head = $userRole == 'RW' ? 'List Data Warga RW 13' : 'List Data Warga ' . $userRole;
        $desc = 'Berikut adalah data warga terdaftar di sistem ' . ($userRole == 'RW' ? 'RW 13' : $userRole) . '.';

        $data = [
            'title' => 'Kelola Data Warga',
            'active' => 'warga',
            'menu' => 'index',
            'head' => $head,
            'desc' => $desc,
            'rt' => 'RW'
        ];

        $rt = $request->input('rt', null);
        if ($rt !== null && $rt !== 'RW') {
            $data['rt'] = $rt;
        }

        $warga = $this->civilliantService->getFilteredData($request, $rt)->paginate(6);
        $warga->appends(request()->all());

        return view('pages.civillian.index', ['data' => $data, 'warga' => $warga]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'Kelola Data Warga',
            'active' => 'warga',
            'menu' => 'create',
            'head' => 'Tambah Data Warga',
        ];

        return view('pages.civillian.create', compact('data'));
    }

    /**
     * @param StoreCivilliantRequest $requestCivil
     * @param StoreStatusRequest $requestStatus
     * @param StoreAlamatRequest $requestAlamat
     * @return RedirectResponse
     * Store a new data.
     */
    public function store(StoreCivilliantRequest $requestCivil, StoreStatusRequest $requestStatus, StoreAlamatRequest $requestAlamat): RedirectResponse
    {
        try {
            DB::beginTransaction();

            $requestCivil->merge([
                'id_alamat' => Alamat::insertGetId($requestAlamat->all()),
                'id_status' => Status::insertGetId($requestStatus->all())
            ]);

            // check if noKK dont have kepala keluarga
            if (!$this->civilliantService->checkKepalaKeluarga($requestStatus, $requestCivil)) {
                return back()->with('error', 'Tidak ada Kepala Keluarga dengan nomor KK yang sama.');
            }

            $wargaId = Warga::insertGetId($requestCivil->all());

            if ($requestStatus->input('status_hidup') != 'Meninggal') {
                $this->civilliantService->updateOrCreateKeluarga($requestCivil, $requestStatus, $wargaId);
            }

            DB::commit();

            return redirect()->intended(route('warga.index'))->with('success', 'Data berhasil ditambahkan!');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Terjadi kesalahan saat menambahkan data');
        }
    }

    /**
     * @param string $id
     * Display the specified data.
     */
    public function show(string $id)
    {
        $data = [
            'title' => 'Kelola Data Warga',
            'active' => 'warga',
            'menu' => 'show',
            'head' => 'Detail Warga',
        ];

        $warga = Warga::with('alamat', 'status')->orderBy('noKK', 'asc')->find($id);
        $warga = convertTTL($warga);

        return view('pages.civillian.detail', compact('data', 'warga'));
    }

    /**
     * @param string $id
     * Show the form for editing the specified data.
     */
    public
    function edit(string $id)
    {
        $data = [
            'title' => 'Kelola Data Warga',
            'active' => 'warga',
            'menu' => 'edit',
            'head' => 'Ubah Data Warga',
        ];

        $warga = Warga::with('alamat', 'status')->orderBy('noKK', 'asc')->find($id);
        $warga = convertTTL($warga);

        return view('pages.civillian.edit', compact('data', 'warga'));
    }

    /**
     * @param UpdateCivilliantRequest $civilliantRequest
     * @param UpdateAlamatRequest $alamatRequest
     * @param UpdateStatusRequest $statusRequest
     * @param string $id
     * @return RedirectResponse
     * Update the specified data in storage.
     */
    public function update(UpdateCivilliantRequest $civilliantRequest, UpdateAlamatRequest $alamatRequest, UpdateStatusRequest $statusRequest, string $id): RedirectResponse
    {
        try {
            DB::beginTransaction();

            $warga = Warga::find($id);
            $warga->lockForUpdate();

            $alamat = Alamat::find(optional($warga)->id_alamat);
            $alamat->lockForUpdate();

            $status = Status::find(optional($warga)->id_status);
            $status->lockForUpdate();

            $pendapatanAwal = optional($warga)->pendapatan;

            $updated = $this->civilliantService->updateEntities($civilliantRequest, $alamatRequest, $statusRequest, $warga, $alamat, $status);

            $pendapatanBaru = optional($warga)->pendapatan;

            $kk = Keluarga::where('noKK', optional($warga)->noKK)->first();

            $this->civilliantService->updateKeluarga($statusRequest, $pendapatanAwal, $pendapatanBaru, $kk);

            DB::commit();

            if (session()->get('last_route') == 'bansos.edit') {
                session()->forget('last_route');
                return redirect()->intended(route('bansos.index'))
                    ->with('success', 'Data berhasil diubah!');
            }

            if (!$updated) {
                return redirect()->intended(route('warga.show', ['warga' => $id]))
                    ->with('error', 'Tidak ada Data yang diubah!');
            }

            return redirect()->intended(route('warga.show', ['warga' => $id]))
                ->with('success', 'Data berhasil diubah!');
        } catch (\Exception $e) {
            DB::rollback();

            if (session()->get('last_route') == 'bansos.edit') {
                session()->forget('last_route');
                return redirect()->intended(route('bansos.index'))
                    ->with('error', 'Terjadi kesalahan saat mengubah data');
            }

            return redirect()->intended(route('warga.show', ['warga' => $id]))
                ->with('error', 'Terjadi kesalahan saat mengubah data');
        }
    }
}
