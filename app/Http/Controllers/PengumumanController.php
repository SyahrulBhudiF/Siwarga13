<?php

namespace App\Http\Controllers;

use App\Http\Requests\file\StoreFileRequest;
use App\Http\Requests\file\UpdateFileRequest;
use App\Http\Requests\pengumuman\StorePengumumanRequest;
use App\Http\Requests\pengumuman\UpdatePengumumanRequest;
use App\Models\File;
use App\Models\Pengumuman;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PengumumanController extends Controller
{
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
            $cloudinary = $uploadedFile->storeOnCloudinary('pdf');
            $cloudinaryFile = $cloudinary->getSecurePath();
            $publicId = $cloudinary->getPublicId();

            $directory = public_path('thumbnail');

            // manipulate image to get page 1 of pdf
            $imagick = new \Imagick();
            $imagick->readImage($uploadedFile->getRealPath() . '[0]');
            $imagick->setImageFormat('jpeg');
            $imagick->writeImage($directory . '/thumbnail.jpeg');

            $url = public_path('thumbnail/thumbnail.jpeg');

            // push to cloudinary
            $thumbnailCloudinary = Cloudinary::uploadFile($url, ['folder' => 'thumbnail']);
            $thumbnailCloudinaryFile = $thumbnailCloudinary->getSecurePath();
            $thumbnailId = $thumbnailCloudinary->getPublicId();

            $requestPengumuman->merge([
                'path_thumbnail' => $thumbnailCloudinaryFile,
                'publicId' => $publicId,
            ]);

            $idPengumuman = Pengumuman::insertGetId($requestPengumuman->except('file'));
            File::insert([
                'id_pengumuman' => $idPengumuman,
                'type' => 'pengumuman',
                'path' => $cloudinaryFile,
                'publicId' => $thumbnailId,
                'name' => $name,
            ]);

            DB::commit();

            return redirect()->route('pengumuman.index')->with('success', 'Berhasil menambahkan pengumuman');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menambahkan pengumuman');
//        }
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
            ->where('id_pengumuman', $id and 'penerbit', auth()->user()->name)
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
                $cloudinary = $fileRequest->file('file')->storeOnCloudinary('pdf');
                $cloudinaryFile = $cloudinary->getSecurePath();
                $publicId = $cloudinary->getPublicId();

                $directory = public_path('thumbnail');

                // Manipulasi gambar untuk mendapatkan halaman 1 dari pdf
                $imagick = new \Imagick();
                $imagick->readImage($fileRequest->file('file')->getRealPath() . '[0]');
                $imagick->setImageFormat('jpeg');
                $imagick->writeImage($directory . '/thumbnail.jpeg');

                $url = public_path('thumbnail/thumbnail.jpeg');

                // Upload thumbnail ke Cloudinary
                $thumbnailCloudinary = Cloudinary::uploadFile($url, ['folder' => 'thumbnail']);
                $thumbnailCloudinaryFile = $thumbnailCloudinary->getSecurePath();
                $thumbnailId = $thumbnailCloudinary->getPublicId();

                // Update data pengumuman
                $pengumuman->update([
                    'path_thumbnail' => $thumbnailCloudinaryFile,
                    'publicId' => $publicId,
                ]);

                // Update data file
                $file->update([
                    'path' => $cloudinaryFile,
                    'publicId' => $thumbnailId,
                    'name' => $fileRequest->file('file')->getClientOriginalName(),
                ]);

                $isUdated = true;

            } elseif (!empty($pengumumanRequest->all())) {
                // Jika tidak ada file baru, hanya update data pengumuman
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
}
