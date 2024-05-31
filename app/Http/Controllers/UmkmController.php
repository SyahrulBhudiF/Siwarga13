<?php

namespace App\Http\Controllers;

use App\Http\Requests\file\OldImageRequest;
use App\Http\Requests\file\StoreImageRequest;
use App\Http\Requests\file\UpdateImageRequest;
use App\Http\Requests\umkm\StoreUmkmRequest;
use App\Http\Requests\umkm\UpdateUmkmRequest;
use App\Models\File;
use App\Models\Umkm;
use App\Services\CloudinaryService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class UmkmController extends Controller
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
            'title' => 'UMKM',
            'active' => 'umkm',
        ];

        $umkm = Umkm::paginate(6);

        return view('pages.umkm.index', compact('data', 'umkm'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        $data = [
            'title' => 'UMKM',
            'active' => 'umkm',
            'head' => 'Tambah UMKM Baru',
        ];

        return view('pages.umkm.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreUmkmRequest $umkmRequest
     * @param StoreImageRequest $fileRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreUmkmRequest $umkmRequest, StoreImageRequest $fileRequest): RedirectResponse
    {
        try {
            DB::beginTransaction();
            $idUmkm = Umkm::insertGetId($umkmRequest->except('file1', 'file2', 'file3', 'file4', 'file5', 'file6'));

            foreach ($fileRequest->all() as $file) {
                if ($file) {
                    $cloudinaryData = $this->cloudinaryService->uploadFileToCloudinary($file, 'umkm');
                    $originalName = $file->getClientOriginalName();

                    File::insert([
                        'id_umkm' => $idUmkm,
                        'type' => 'umkm',
                        'path' => $cloudinaryData['path'],
                        'publicId' => $cloudinaryData['publicId'],
                        'name' => $originalName,
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('umkm.index')->with('success', 'Berhasil menambahkan data.');

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
            'title' => 'UMKM',
            'active' => 'umkm',
            'head' => 'Edit UMKM',
        ];

        $umkm = Umkm::with('file')->find($id);
        $harga = explode(' - ', $umkm->harga);
        $umkm->harga_awal = (int)str_replace('Rp', '', $harga[0]);
        $umkm->harga_akhir = (int)str_replace('Rp', '', $harga[1]);

        return view('pages.umkm.edit', compact('data', 'umkm'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUmkmRequest $umkmRequest
     * @param UpdateImageRequest $imageRequest
     * @param OldImageRequest $oldRequest
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateUmkmRequest $umkmRequest, UpdateImageRequest $imageRequest, OldImageRequest $oldRequest, string $id): RedirectResponse
    {
        try {
            DB::beginTransaction();

            if ($umkmRequest != []) {
                Umkm::where('id_umkm', $id)->update($umkmRequest->validated());
            }

            $existingFiles = File::where('id_umkm', $id)->get();
            $oldRequestData = array_values($oldRequest->all());
            $imageRequestData = array_values($imageRequest->all());

            $this->cloudinaryService->processFiles($existingFiles, $oldRequestData, $imageRequestData, $id, 'umkm');

            DB::commit();

            return redirect()->route('umkm.index')->with('success', 'Berhasil mengubah data.');
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

            $umkm = Umkm::find($id);
            $files = File::where('id_umkm', $id)->get();

            $this->cloudinaryService->deleteFiles($files);

            $umkm->delete();

            DB::commit();

            return redirect()->route('umkm.index')->with('success', 'Berhasil menghapus data.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menghapus data. Silahkan coba lagi.');
        }
    }
}
