<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CivilliantController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->input('search', '');
        $query = Warga::with('alamat');

        if (Auth::user()->role != 'RW') {
            $query->whereHas('alamat', function ($query) {
                $query->where('rt', Auth::user()->role);
            });
        }

        if (preg_match('/^\d/', $search)) {
            $warga = $query
                ->where('noKK', 'like', "%{$search}%")
                ->paginate(6);
        } else {
            $warga = $query
                ->where('nama', 'like', "%{$search}%")
                ->paginate(6);
        }

        if ($warga->isEmpty()) {
            return response()->json(['error' => 'No results found'], 404);
        }

        return response()->json([$warga], 200);
    }
}
