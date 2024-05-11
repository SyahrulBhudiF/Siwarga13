<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlamatRequest;
use App\Http\Requests\StoreCivilliantRequest;
use App\Http\Requests\StoreStatusRequest;
use App\Models\Alamat;
use App\Models\Status;
use App\Models\Warga;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CivilliantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = [
            'title' => 'Kelola Data Warga',
            'active' => 'warga',
            'menu' => 'index',
            'head' => 'List Data Warga RW 13',
            'desc' => 'Berikut adalah data warga terdaftar di sistem RW 13.',
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
     * Get filtered data based on request.
     */
    private function getFilteredData(Request $request, $rt)
    {
        $query = Warga::with('alamat', 'status')->orderBy('noKK', 'asc');

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

    private function convertTTL($warga)
    {
        $ttl = $warga['ttl'];
        $ttl_parts = explode(',', $ttl);

        $warga['tempat_lahir'] = trim($ttl_parts[0]);
        $warga['tanggal'] = trim($ttl_parts[1]);

        return $warga;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCivilliantRequest $requestCivil, StoreStatusRequest $requestStatus, StoreAlamatRequest $requestAlamat): RedirectResponse
    {
        try {
            $requestCivil->merge([
                'id_alamat' => Alamat::insertGetId($requestAlamat->all()),
                'id_status' => Status::insertGetId($requestStatus->all())
            ]);
            Warga::insert($requestCivil->all());

            return redirect()->intended(route('warga.index'))->with('success', 'Data berhasil ditambahkan!');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat menambahkan data');
        }
    }

    /**
     * Display the specified resource.
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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
