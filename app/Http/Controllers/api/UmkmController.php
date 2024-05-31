<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Umkm;
use Illuminate\Http\Request;

class UmkmController extends Controller
{
    public function search(Request $request)
    {
        try {
            $search = $request->input('search', '');

            $umkm = Umkm::where('judul', 'like', "%{$search}%")->get();

            if ($umkm->isEmpty()) {
                return response()->json(['error' => 'No results found'], 404);
            }

            return response()->json([$umkm], 200);

        } catch (\Exception $e) {
            return response()->json(['error' => 'No results found'], 500);
        }
    }
}
