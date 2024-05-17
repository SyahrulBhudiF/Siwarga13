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

class CivilliantController extends Controller
{
    /**
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
     * Store a newly created resource in storage.
     */
    public function store(StoreCivilliantRequest $requestCivil, StoreStatusRequest $requestStatus, StoreAlamatRequest $requestAlamat): RedirectResponse
    {
        $statusId = $this->createStatus($requestStatus);
        $alamatId = $this->createAlamat($requestAlamat);

        $requestCivil->merge([
            'id_status' => $statusId,
            'id_alamat' => $alamatId,
        ]);

        $wargaId = Warga::insertGetId($requestCivil->all());

        if ($requestStatus->input('status_hidup') != 'Meninggal') {
            $this->updateOrCreateKeluarga($requestCivil, $wargaId);
        }

        return redirect()->intended(route('warga.index'))->with('success', 'Data berhasil ditambahkan!');
    }

    private function createStatus(StoreStatusRequest $requestStatus)
    {
        try {
            return Status::insertGetId($requestStatus->all());
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat menambahkan status');
        }
    }

    private function createAlamat(StoreAlamatRequest $requestAlamat)
    {
        try {
            return Alamat::insertGetId($requestAlamat->all());
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat menambahkan alamat');
        }
    }

    private function updateOrCreateKeluarga(StoreCivilliantRequest $requestCivil, $wargaId)
    {
        if ($requestCivil->input('status_peran') == 'Kepala keluarga') {
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
     * Display the specified resource.
     */
    public
    function show(string $id)
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
     * Show the form for editing the specified resource.
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
     * Update the specified resource in storage.
     */
    public
    function update(UpdateCivilliantRequest $civilliantRequest, UpdateAlamatRequest $alamatRequest, UpdateStatusRequest $statusRequest, string $id): RedirectResponse
    {
        try {
            $warga = Warga::find($id);
            $alamat = Alamat::find(optional($warga)->id_alamat);
            $status = Status::find(optional($warga)->id_status);

            $pendapatanAwal = optional($warga)->pendapatan;

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
                $updated = true;
            }

            $pendapatanBaru = optional($warga)->pendapatan;

            if ($pendapatanAwal != $pendapatanBaru) {
                $kk = Keluarga::where('noKK', optional($warga)->noKK)->first();

                if ($kk) {
                    $selisihPendapatan = $pendapatanBaru - $pendapatanAwal;

                    $kk->update([
                        'total_pendapatan' => $kk->total_pendapatan + $selisihPendapatan,
                    ]);
                }
            }

            if (!$updated) {
                return redirect()->intended(route('warga.show', ['warga' => $id]))
                    ->with('error', 'Tidak ada Data yang diubah!');
            }

            return redirect()->intended(route('warga.show', ['warga' => $id]))
                ->with('success', 'Data berhasil diubah!');

        } catch (\Exception $e) {
            return redirect()->intended(route('warga.show', ['warga' => $id]))
                ->with('error', 'Terjadi kesalahan saat mengubah data');
        }
    }

    /**
     * Convert TTL to tempat_lahir and tanggal.
     */
    private
    function convertTTL($warga)
    {
        $ttl = $warga['ttl'];
        $ttl_parts = explode(',', $ttl);

        $warga['tempat_lahir'] = trim($ttl_parts[0]);
        $warga['tanggal'] = trim($ttl_parts[1]);

        return $warga;
    }

    /**
     * Get filtered data based on request.
     */
    private
    function getFilteredData(Request $request, $rt)
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
