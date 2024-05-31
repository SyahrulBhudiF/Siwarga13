<?php

namespace App\Http\Controllers;

use App\Http\Requests\file\StoreImageRequest;
use App\Http\Requests\umkm\StoreUmkmRequest;
use App\Models\File;
use App\Models\Umkm;
use App\Services\CloudinaryService;
use Illuminate\Http\Request;
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
     * @param StoreImageRequest $imageRequest
     *
     */
    public function store(StoreUmkmRequest $umkmRequest, StoreImageRequest $fileRequest)
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
}
