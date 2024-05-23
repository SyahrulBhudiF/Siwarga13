<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\RankEdas;
use App\Models\RankMabac;
use Illuminate\Http\Request;

class BansosController extends Controller
{
    public function search(Request $request)
    {
        try {

            $search = $request->input('search', '');
            $active = $request->input('active', 'edas');

            $query = $active == 'edas' ? RankEdas::with('keluarga.warga') : RankMabac::with('keluarga.warga');

            $field = preg_match('/^\d/', $search) ? 'noKK' : 'nama';

            $results = $query->whereHas('keluarga.warga', function ($query) use ($search, $field) {
                $query->where($field, 'like', '%' . $search . '%');
            })->get();

            if ($results->isEmpty()) {
                return response()->json(['error' => 'No results found'], 404);
            }

            return response()->json([$results], 200);

        } catch (\Exception $e) {
            return response()->json(['error' => 'No results found'], 500);
        }
    }
}
