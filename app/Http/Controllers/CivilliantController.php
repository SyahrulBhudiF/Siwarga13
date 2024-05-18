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
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CivilliantController extends Controller
{
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

        $warga = $this->getFilteredData($request, $rt)->paginate(6);
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

            $wargaId = Warga::insertGetId($requestCivil->all());

            if ($requestStatus->input('status_hidup') != 'Meninggal') {
                $this->updateOrCreateKeluarga($requestCivil, $requestStatus, $wargaId);
            }

            DB::commit();

            return redirect()->intended(route('warga.index'))->with('success', 'Data berhasil ditambahkan!');

        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Terjadi kesalahan saat menambahkan data');
        }
    }

    /**
     * @param StoreCivilliantRequest $requestCivil
     * @param StoreStatusRequest $requestStatus
     * @param $wargaId
     * store keluarga data
     */
    private function updateOrCreateKeluarga(StoreCivilliantRequest $requestCivil, StoreStatusRequest $requestStatus, $wargaId)
    {
        if ($requestStatus->input('status_peran') == 'Kepala keluarga') {
            Keluarga::insert([
                'noKK' => $requestCivil->input('noKK'),
                'id_warga' => $wargaId,
                'total_pendapatan' => $requestCivil->input('pendapatan'),
                'tanggungan' => 1,
                'jumlah_pekerja' => $requestCivil->input('pendapatan') == 0 ? 0 : 1,
            ]);

        } else {
            $kk = Keluarga::where('noKK', $requestCivil->input('noKK'))->first();

            if ($kk) {
                $kk->update([
                    'total_pendapatan' => $kk->total_pendapatan + $requestCivil->input('pendapatan'),
                    'tanggungan' => $kk->tanggungan + 1,
                    'jumlah_pekerja' => $requestCivil->input('pendapatan') == 0 ? $kk->jumlah_pekerja : $kk->jumlah_pekerja + 1,
                ]);
            }
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
        $warga = $this->convertTTL($warga);

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
        $warga = $this->convertTTL($warga);

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

            $updated = $this->updateEntities($civilliantRequest, $alamatRequest, $statusRequest, $warga, $alamat, $status);

            $pendapatanBaru = optional($warga)->pendapatan;

            $kk = Keluarga::where('noKK', optional($warga)->noKK)->first();

            $this->updateKeluarga($statusRequest, $pendapatanAwal, $pendapatanBaru, $kk);

            DB::commit();

            if (!$updated) {
                return redirect()->intended(route('warga.show', ['warga' => $id]))
                    ->with('error', 'Tidak ada Data yang diubah!');
            }

            return redirect()->intended(route('warga.show', ['warga' => $id]))
                ->with('success', 'Data berhasil diubah!');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->intended(route('warga.show', ['warga' => $id]))
                ->with('error', 'Terjadi kesalahan saat mengubah data');
        }
    }

    /**
     * @param $civilliantRequest
     * @param $alamatRequest
     * @param $statusRequest
     * @param $warga
     * @param $alamat
     * @param $status
     * @return bool
     * update entities
     */
    private function updateEntities($civilliantRequest, $alamatRequest, $statusRequest, $warga, $alamat, $status)
    {
        $updated = false;

        if ($civilliantRequest->all() !== []) {
            tap($warga)->update($civilliantRequest->all());
            $updated = true;
        }

        if ($alamatRequest->all() !== []) {
            tap($alamat)->update($alamatRequest->all());
            $updated = true;
        }

        if ($statusRequest->all() !== []) {
            tap($status)->update($statusRequest->all());

            if ($statusRequest->input('status_hidup') == 'Meninggal') {
                $warga->update([
                    'pendapatan' => 0,
                ]);
            }

            if ($statusRequest->input('status_hidup') == 'Meninggal' && $status->status_peran == 'Kepala keluarga') {
                $status->update([
                    'status_peran' => 'Anggota keluarga',
                ]);
            }

            $updated = true;
        }

        return $updated;
    }

    /**
     * @param $statusRequest
     * @param $pendapatanAwal
     * @param $pendapatanBaru
     * @param $kk
     * @return void
     * update keluarga
     */
    private function updateKeluarga($statusRequest, $pendapatanAwal, $pendapatanBaru, $kk)
    {
        if ($statusRequest->input('status_hidup') == 'Meninggal') {

            if ($pendapatanAwal > 0) {
                $kk->update([
                    'total_pendapatan' => $kk->total_pendapatan - $pendapatanAwal,
                    'tanggungan' => $kk->tanggungan - 1,
                    'jumlah_pekerja' => $kk->jumlah_pekerja - 1,
                ]);

            } else {
                $kk->update([
                    'tanggungan' => $kk->tanggungan - 1,
                ]);
            }

        } else if ($pendapatanAwal != $pendapatanBaru) {
            $selisihPendapatan = $pendapatanBaru - $pendapatanAwal;

            $kk->update([
                'total_pendapatan' => $kk->total_pendapatan + $selisihPendapatan,
            ]);
        }
    }

    /**
     * @param $warga
     * convert TTL
     */
    private function convertTTL($warga)
    {
        $ttl = $warga['ttl'];
        $ttl_parts = explode(',', $ttl);

        $warga['tempat_lahir'] = trim($ttl_parts[0]);
        $warga['tanggal'] = trim($ttl_parts[1]);

        return $warga;
    }

    /**
     * @param Request $request
     * @param $rt
     * @return \Illuminate\Database\Eloquent\Builder
     * get filtered data
     */
    private function getFilteredData(Request $request, $rt)
    {
        if (Auth::user()->role == 'RW') {
            $query = Warga::with('alamat', 'status')->orderBy('noKK', 'asc');

        } else {
            $query = Warga::with('alamat', 'status')
                ->whereHas('alamat', function ($query) {
                    $query->where('rt', Auth::user()->role);
                })
                ->orderBy('noKK', 'asc');
        }

        if ($rt !== null && $rt !== 'RW') {
            $query->whereHas('alamat', function ($query) use ($rt) {
                $query->where('rt', $rt);
            });
        }

        if ($request->has('peran')) {
            $query->whereHas('status', function ($query) use ($request) {
                $query->where('status_peran', $request->input('peran'));
            });
        }

        if ($request->has('gender')) {
            $query->where('jenis_kelamin', $request->input('gender'));
        }

        if ($request->has('status')) {
            $status = $request->input('status');

            if (is_array($status)) {
                $query->whereHas('status', function ($query) use ($status) {
                    $query->whereIn('status_hidup', $status);
                });

            } else {
                $query->whereHas('status', function ($query) use ($status) {
                    $query->where('status_hidup', $status);
                });
            }
        }

        return $query;
    }
}
