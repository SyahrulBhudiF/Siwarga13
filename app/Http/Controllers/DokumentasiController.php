<?php

namespace App\Http\Controllers;

use App\Http\Requests\dokumentasi\StoreDokumentasiRequest;
use App\Http\Requests\dokumentasi\UpdateDokumentasiRequest;
use App\Http\Requests\file\OldImageRequest;
use App\Http\Requests\file\StoreFileRequest;
use App\Http\Requests\file\StoreImageRequest;
use App\Http\Requests\file\UpdateImageRequest;
use App\Models\Dokumentasi;
use App\Models\File;
use App\Services\CloudinaryService;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
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

    public function edit(string $id)
    {
        $data = [
            'title' => 'Kegiatan Warga',
            'active' => 'kegiatan',
            'head' => 'Tambah Dokumentasi Baru',
        ];

        $dokumentasi = Dokumentasi::with('file')->find($id);

        return view('pages.dokumentasi.edit', compact('data', 'dokumentasi'));
    }

    public function update(UpdateDokumentasiRequest $dokumentasiRequest, UpdateImageRequest $imageRequest, OldImageRequest $oldRequest, string $id)
    {
        try {
            DB::beginTransaction();

            if ($dokumentasiRequest != []) {
                Dokumentasi::where('id_dokumentasi', $id)->update($dokumentasiRequest->validated());
            }

            // Ambil semua file dengan id_dokumentasi yang sama dengan id yang diberikan
            $existingFiles = File::where('id_dokumentasi', $id)->get();

// Dapatkan data dari oldRequest dan imageRequest
            $oldRequestData = array_values($oldRequest->all());
            $imageRequestData = array_values($imageRequest->all());

// Loop melalui setiap elemen dalam oldRequest
            foreach ($oldRequestData as $index => $oldRequestItem) {
                // Jika oldRequest pada indeks ini null dan file yang ada pada indeks yang sama tidak null
//            dd($oldRequestItem, $existingFiles[$index]->toArray());
                if ($oldRequestItem === null && isset($existingFiles[$index])) {
                    // Hancurkan file di Cloudinary
                    Cloudinary::destroy($existingFiles[$index]->publicId);

                    // Hapus file yang ada
                    $existingFiles[$index]->delete();
                } // Jika oldRequest pada indeks ini tidak null dan file yang ada pada indeks yang sama null
                else if ($oldRequestItem !== null && !isset($existingFiles[$index])) {
                    // Jika ada file baru dalam imageRequest pada indeks yang sama
                    if (isset($imageRequestData[$index])) {
                        dd('ok2');
                        // Dapatkan file baru
                        $newFile = $imageRequestData[$index];

                        // Upload file baru ke Cloudinary dan dapatkan data yang dikembalikan
                        $cloudinaryData = $this->cloudinaryService->uploadFileToCloudinary($newFile, 'dokumentasi');

                        // Buat file baru dalam database dengan data yang dikembalikan dari Cloudinary
                        File::create([
                            'id_dokumentasi' => $id,
                            'type' => 'dokumentasi',
                            'path' => $cloudinaryData['path'],
                            'publicId' => $cloudinaryData['publicId'],
                            'name' => $newFile->getClientOriginalName(),
                        ]);
                    }
                }
            }

// Jika oldRequest memiliki lebih banyak elemen daripada existingFiles
            if (count($oldRequestData) > count($existingFiles)) {
                // Loop melalui setiap elemen tambahan dalam oldRequest
                for ($i = count($existingFiles); $i < count($oldRequestData); $i++) {
                    // Jika ada file baru dalam imageRequest pada indeks yang sama
                    if (isset($imageRequestData[$i])) {
//                    dd('ok');
                        // Dapatkan file baru
                        $newFile = $imageRequestData[$i];

                        // Upload file baru ke Cloudinary dan dapatkan data yang dikembalikan
                        $cloudinaryData = $this->cloudinaryService->uploadFileToCloudinary($newFile, 'dokumentasi');

                        // Buat file baru dalam database dengan data yang dikembalikan dari Cloudinary
                        File::create([
                            'id_dokumentasi' => $id,
                            'type' => 'dokumentasi',
                            'path' => $cloudinaryData['path'],
                            'publicId' => $cloudinaryData['publicId'],
                            'name' => $newFile->getClientOriginalName(),
                        ]);
                    }
                }
            }

            DB::commit();

            return redirect()->route('dokumentasi.index')->with('success', 'Berhasil mengubah data.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal mengubah data. Silahkan coba lagi.');
        }
    }
}
