<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Exceptions\HttpResponseException;
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
            'head' => 'Tambah Data Warga',
        ];

        return view('pages.civillian.create', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
