<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Artikel;

class ArtikelController extends Controller
{
    public function index()
    {
        $query = Artikel::with('kategoriObj');

        if ($search = request('search')) {
            $query->where('judul', 'like', "%{$search}%");
        }

        if ($kid = request('kategori_id')) {
            $query->where('kategori_id', $kid);
        }

        return response()->json([
            'status' => 'success',
            'data'   => $query->latest()->get(),
        ], 200);
    }

    public function show(Artikel $artikel)
    {
        return response()->json([
            'status' => 'success',
            'data'   => $artikel->load('kategoriObj'),
        ], 200);
    }
}
