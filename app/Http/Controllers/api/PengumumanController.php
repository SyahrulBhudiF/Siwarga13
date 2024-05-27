<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function search(Request $request)
    {
        try {
            $search = $request->input('search', '');

            $query = Pengumuman::with('file')
                ->where('penerbit', auth()->user()->name);

            $pengumuman = $query->where('judul', 'like', "%{$search}%")->get();

            if ($pengumuman->isEmpty()) {
                return response()->json(['error' => 'No results found'], 404);
            }

            return response()->json([$pengumuman], 200);

        } catch (\Exception $e) {
            return response()->json(['error' => 'No results found'], 500);
        }
    }
}
