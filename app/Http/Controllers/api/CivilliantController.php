<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Warga;
use Illuminate\Http\Request;

class CivilliantController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->input('search', '');
        if (preg_match('/^\d/', $search)) {
            $warga = Warga::with('alamat')
                ->where('noKK', 'like', "%{$search}%")
                ->paginate(6);
        } else {
            $warga = Warga::with('alamat')
                ->where('nama', 'like', "%{$search}%")
                ->paginate(6);
        }

        if ($warga->isEmpty()) {
            return response()->json(['error' => 'No results found'], 404);
        }

        return response()->json([$warga], 200);
    }
}
