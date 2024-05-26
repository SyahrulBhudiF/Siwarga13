<?php

namespace App\Http\Controllers;

use App\Http\Requests\file\StoreFileRequest;
use App\Http\Requests\pengumuman\StorePengumumanRequest;
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

            // push to cloudinary
            $cloudinaryFile = $uploadedFile->storeOnCloudinary('pdf')->getSecurePath();

            $directory = public_path('thumbnail');

            // manipulate image to get page 1 of pdf
            $imagick = new \Imagick();
            $imagick->readImage($uploadedFile->getRealPath() . '[0]');
            $imagick->setImageFormat('jpeg');
            $imagick->writeImage($directory . '/thumbnail.jpeg');

            $url = public_path('thumbnail/thumbnail.jpeg');

            // push to cloudinary
            $thumbnailCloudinaryFile = Cloudinary::uploadFile($url, ['folder' => 'thumbnail'])
                ->getSecurePath();

            $requestPengumuman->merge([
                'path_thumbnail' => $thumbnailCloudinaryFile,
            ]);

            $idPengumuman = Pengumuman::insertGetId($requestPengumuman->except('file'));
            File::insert([
                'id_pengumuman' => $idPengumuman,
                'type' => 'pengumuman',
                'path' => $cloudinaryFile,
            ]);

            DB::commit();

            return redirect()->route('pengumuman.index')->with('success', 'Berhasil menambahkan pengumuman');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal menambahkan pengumuman');
//        }
        }
    }
}
