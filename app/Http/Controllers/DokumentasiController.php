<?php

namespace App\Http\Controllers;

use App\Http\Requests\dokumentasi\StoreDokumentasiRequest;
use App\Http\Requests\dokumentasi\UpdateDokumentasiRequest;
use App\Http\Requests\file\StoreFileRequest;
use App\Http\Requests\file\StoreImageRequest;
use App\Http\Requests\file\UpdateImageRequest;
use App\Models\Dokumentasi;
use App\Models\File;
use App\Services\CloudinaryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DokumentasiController extends Controller
{
    public CloudinaryService $cloudinaryService;

    public function __construct(CloudinaryService $cloudinaryService)
    {
        $this->cloudinaryService = $cloudinaryService;
    }

    public function index()
    {
        $data = [
            'title' => 'Kegiatan Warga',
            'active' => 'kegiatan',
        ];

        $dokumentasi = Dokumentasi::paginate(6);

        return view('pages.dokumentasi.index', compact('data', 'dokumentasi'));
    }

    public function create()
    {
        $data = [
            'title' => 'Kegiatan Warga',
            'active' => 'kegiatan',
            'head' => 'Tambah Dokumentasi Baru',
        ];

        return view('pages.dokumentasi.create', compact('data'));
    }

    public function store(StoreDokumentasiRequest $dokumentasiRequest, StoreImageRequest $fileRequest)
    {
        try {
            DB::beginTransaction();
            dd($dokumentasiRequest->toArray(), $fileRequest->toArray());
            $idDokumentasi = Dokumentasi::insertGetId($dokumentasiRequest->except('file[]'));

            foreach ($fileRequest->all() as $file) {
                if ($file) {
                    $cloudinaryData = $this->cloudinaryService->uploadFileToCloudinary($file, 'dokumentasi');
                    $originalName = $file->getClientOriginalName();

                    File::insert([
                        'id_dokumentasi' => $idDokumentasi,
                        'type' => 'dokumentasi',
                        'path' => $cloudinaryData['path'],
                        'publicId' => $cloudinaryData['publicId'],
                        'name' => $originalName,
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('dokumentasi.index')->with('success', 'Berhasil menambahkan data.');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menambahkan data. Silahkan coba lagi.');
        }
    }

    public function edit(string $id)
    {
        $data = [
            'title' => 'Kegiatan Warga',
            'active' => 'kegiatan',
            'head' => 'Tambah Dokumentasi Baru',
        ];

        $dokumentasi = Dokumentasi::with('file')->find($id)->first();
//        dd($dokumentasi->toArray());

        return view('pages.dokumentasi.edit', compact('data', 'dokumentasi'));
    }

    public function update(UpdateDokumentasiRequest $dokumentasiRequest, UpdateImageRequest $imageRequest)
    {
        dd($imageRequest->toArray());
    }
}
