<?php

namespace App\Http\Controllers;

use App\Http\Requests\file\StoreFileRequest;
use App\Http\Requests\file\UpdateFileRequest;
use App\Http\Requests\pengumuman\StorePengumumanRequest;
use App\Http\Requests\pengumuman\UpdatePengumumanRequest;
use App\Models\File;
use App\Models\Pengumuman;
use App\Services\CloudinaryService;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PengumumanController extends Controller
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
            'title' => 'Pengumuman',
            'active' => 'pengumuman',
        ];

        $pengumuman = Pengumuman::with('file')
            ->where('penerbit', auth()->user()->name)
            ->paginate(6);

        return view('pages.pengumuman.index', compact('data', 'pengumuman'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        $data = [
            'title' => 'Pengumuman',
            'active' => 'pengumuman',
            'head' => 'Tambah Pengumuman Baru',
        ];

        return view('pages.pengumuman.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePengumumanRequest $requestPengumuman
     * @param StoreFileRequest $requestFile
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StorePengumumanRequest $requestPengumuman, StoreFileRequest $requestFile): RedirectResponse
    {
        // try {
        DB::beginTransaction();

        $uploadedFile = $requestFile->file('file');
        $name = $uploadedFile->getClientOriginalName();

        // push to cloudinary
        $cloudinaryData = $this->cloudinaryService->uploadFileToCloudinary($uploadedFile, 'pdf');

        $publicId = $cloudinaryData['publicId'];
        // Membuat URL thumbnail dari PDF
        $thumbnailUrl = cloudinary()->uploadApi()->explicit($publicId, [
            'type' => 'upload',
            'transformation' => [
                'width' => 150,
                'height' => 150,
                'crop' => 'fill',
                'page' => 1
            ],
            'format' => 'jpg', // Mengubah format thumbnail menjadi JPG
            'resource_type' => 'image'
        ])->getSecureUrl();


        dd($thumbnailUrl);
        // push thumbnail to cloudinary
        $thumbnailCloudinaryData = $this->cloudinaryService->uploadFileToCloudinary($thumbnailUrl, 'thumbnail');

        $requestPengumuman->merge([
            'path_thumbnail' => $thumbnailCloudinaryData['path'],
            'publicId' => $thumbnailCloudinaryData['publicId'],
        ]);

        $idPengumuman = Pengumuman::insertGetId($requestPengumuman->except('file'));
        File::insert([
            'id_pengumuman' => $idPengumuman,
            'type' => 'pengumuman',
            'path' => $cloudinaryData['path'],
            'publicId' => $cloudinaryData['publicId'],
            'name' => $name,
        ]);

        DB::commit();

        return redirect()->route('pengumuman.index')->with('success', 'Berhasil menambahkan pengumuman');
        // } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->back()->with('error', 'Gagal menambahkan pengumuman');
        // }
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
            'title' => 'Pengumuman',
            'active' => 'pengumuman',
            'head' => 'Edit Pengumuman',
        ];

        $pengumuman = Pengumuman::with('file')
            ->where('id_pengumuman', $id)
            ->where('penerbit', auth()->user()->name)
            ->first();

        return view('pages.pengumuman.edit', compact('data', 'pengumuman'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePengumumanRequest $pengumumanRequest
     * @param UpdateFileRequest $fileRequest
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdatePengumumanRequest $pengumumanRequest, UpdateFileRequest $fileRequest, string $id): RedirectResponse
    {
        try {
            DB::beginTransaction();

            $isUdated = false;

            $pengumuman = Pengumuman::find($id);
            $file = File::where('id_pengumuman', $id)->first();

            if ($fileRequest->hasFile('file') && $fileRequest != []) {
                Cloudinary::destroy($file->publicId);
                Cloudinary::destroy($pengumuman->publicId);

                // Upload file baru ke Cloudinary
                $cloudinaryData = $this->cloudinaryService->uploadFileToCloudinary($fileRequest->file('file'), 'pdf');

                $thumbnailUrl = $this->cloudinaryService->createThumbnail($fileRequest->file('file'));

                // Upload thumbnail ke Cloudinary
                $thumbnailCloudinaryData = $this->cloudinaryService->uploadFileToCloudinary($thumbnailUrl, 'thumbnail');

                // Update data pengumuman
                $pengumuman->update([
                    'path_thumbnail' => $thumbnailCloudinaryData['path'],
                    'publicId' => $thumbnailCloudinaryData['publicId'],
                ]);
                $pengumuman->update($pengumumanRequest->except('file'));

                // Update data file
                $file->update([
                    'path' => $cloudinaryData['path'],
                    'publicId' => $cloudinaryData['publicId'],
                    'name' => $fileRequest->file('file')->getClientOriginalName(),
                ]);

                $isUdated = true;
            } elseif (!empty($pengumumanRequest->all())) {
                // if new file is not uploaded, update pengumuman only
                $pengumuman->update($pengumumanRequest->except('file'));

                $isUdated = true;
            }

            if (!$isUdated) {
                return redirect()->back()->with('error', 'Tidak ada data yang dirubah');
            }

            DB::commit();

            return redirect()->route('pengumuman.index')->with('success', 'Berhasil mengubah pengumuman');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal mengubah pengumuman');
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
        $pengumuman = Pengumuman::find($id);
        $file = File::where('id_pengumuman', $id)->first();

        if ($pengumuman && $file) {
            try {
                // Delete from Cloudinary
                Cloudinary::destroy($file->publicId);
                Cloudinary::destroy($pengumuman->publicId);

                // Delete from database
                $file->delete();
                $pengumuman->delete();

                return redirect()->route('pengumuman.index')->with('success', 'Berhasil menghapus pengumuman');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Gagal menghapus pengumuman');
            }
        } else {
            return redirect()->back()->with('error', 'Pengumuman tidak ditemukan');
        }
    }
}
