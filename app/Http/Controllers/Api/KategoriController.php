<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => 'success',
            'data'   => Kategori::orderBy('nama')->get(),
        ], 200);
    }

    public function show(Kategori $kategori)
    {
        return response()->json([
            'status' => 'success',
            'data'   => $kategori,
        ], 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama'      => 'required|string|max:255|unique:kategoris,nama',
            'deskripsi' => 'nullable|string',
            'contoh'    => 'nullable|string',
        ]);

        $kategori = Kategori::create($data);

        return response()->json([
            'status'  => 'success',
            'message' => 'Kategori berhasil ditambahkan.',
            'data'    => $kategori,
        ], 201);
    }
}
