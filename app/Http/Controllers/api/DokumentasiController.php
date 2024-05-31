<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Dokumentasi;
use Illuminate\Http\Request;

class DokumentasiController extends Controller
{
    public function search(Request $request)
    {
        try {
            $search = $request->input('search', '');

            $umkm = Dokumentasi::where('judul', 'like', "%{$search}%")->get();

            if ($umkm->isEmpty()) {
                return response()->json(['error' => 'No results found'], 404);
            }

            return response()->json([$umkm], 200);

        } catch (\Exception $e) {
            return response()->json(['error' => 'No results found'], 500);
        }
    }
}
