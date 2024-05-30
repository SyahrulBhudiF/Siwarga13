<?php

namespace App\Http\Controllers;

use App\Http\Requests\dokumentasi\StoreDokumentasiRequest;
use App\Http\Requests\dokumentasi\UpdateDokumentasiRequest;
use App\Http\Requests\file\OldImageRequest;
use App\Http\Requests\file\StoreImageRequest;
use App\Http\Requests\file\UpdateImageRequest;
use App\Models\Dokumentasi;
use App\Models\File;
use App\Services\CloudinaryService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DokumentasiController extends Controller
{
    public CloudinaryService $cloudinaryService;

    public function __construct(CloudinaryService $cloudinaryService)
    {
        $this->cloudinaryService = $cloudinaryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $data = [
            'title' => 'Kegiatan Warga',
            'active' => 'kegiatan',
        ];

        $dokumentasi = Dokumentasi::paginate(6);

        return view('pages.dokumentasi.index', compact('data', 'dokumentasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        $data = [
            'title' => 'Kegiatan Warga',
            'active' => 'kegiatan',
            'head' => 'Tambah Dokumentasi Baru',
        ];

        return view('pages.dokumentasi.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreDokumentasiRequest $dokumentasiRequest
     * @param StoreImageRequest $fileRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreDokumentasiRequest $dokumentasiRequest, StoreImageRequest $fileRequest): RedirectResponse
    {
        try {
            DB::beginTransaction();
            $idDokumentasi = Dokumentasi::insertGetId($dokumentasiRequest->validated());

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $id
     * @return \Illuminate\View\View
     */
    public function edit(string $id): View
    {
        $data = [
            'title' => 'Kegiatan Warga',
            'active' => 'kegiatan',
            'head' => 'Tambah Dokumentasi Baru',
        ];

        $dokumentasi = Dokumentasi::with('file')->find($id);

        return view('pages.dokumentasi.edit', compact('data', 'dokumentasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateDokumentasiRequest $dokumentasiRequest
     * @param UpdateImageRequest $imageRequest
     * @param OldImageRequest $oldRequest
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateDokumentasiRequest $dokumentasiRequest, UpdateImageRequest $imageRequest, OldImageRequest $oldRequest, string $id): RedirectResponse
    {
        try {
            DB::beginTransaction();

            if ($dokumentasiRequest != []) {
                Dokumentasi::where('id_dokumentasi', $id)->update($dokumentasiRequest->validated());
            }

            $existingFiles = File::where('id_dokumentasi', $id)->get();
            $oldRequestData = array_values($oldRequest->all());
            $imageRequestData = array_values($imageRequest->all());

            $this->cloudinaryService->processFiles($existingFiles, $oldRequestData, $imageRequestData, $id, 'dokumentasi');

            DB::commit();

            return redirect()->route('dokumentasi.index')->with('success', 'Berhasil mengubah data.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal mengubah data. Silahkan coba lagi.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(string $id): RedirectResponse
    {
        try {
            DB::beginTransaction();

            $dokumentasi = Dokumentasi::find($id);
            $files = File::where('id_dokumentasi', $id)->get();

            $this->cloudinaryService->deleteFiles($files);

            $dokumentasi->delete();

            DB::commit();

            return redirect()->route('dokumentasi.index')->with('success', 'Berhasil menghapus data.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus data. Silahkan coba lagi.');
        }
    }
}
