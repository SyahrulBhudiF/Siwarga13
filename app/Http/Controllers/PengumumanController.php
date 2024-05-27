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

    public function create(): View
    {
        $data = [
            'title' => 'Pengumuman',
            'active' => 'pengumuman',
            'head' => 'Tambah Pengumuman Baru',
        ];

        return view('pages.pengumuman.create', compact('data'));
    }

    public function store(StorePengumumanRequest $requestPengumuman, StoreFileRequest $requestFile): RedirectResponse
    {
        try {
            DB::beginTransaction();

            $uploadedFile = $requestFile->file('file');
            $name = $uploadedFile->getClientOriginalName();

            // push to cloudinary
            $cloudinaryData = $this->cloudinaryService->uploadFileToCloudinary($uploadedFile, 'pdf');

            $thumbnailUrl = $this->cloudinaryService->createThumbnail($uploadedFile);

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

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menambahkan pengumuman');
        }
    }

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

    public function update(UpdatePengumumanRequest $pengumumanRequest, UpdateFileRequest $fileRequest, string $id)
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

    public function destroy(string $id)
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
