<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Aset;
use Illuminate\Http\Request;

class AsetController extends Controller
{
    public function index()
    {
        $asets = Aset::latest()->get();

        return response()->json([
            'status'  => 'success',
            'message' => 'Daftar aset berhasil diambil.',
            'data'    => $asets,
        ], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode'            => 'required|string|max:30|unique:asets,kode',
            'perangkat'       => 'required|string|max:100',
            'departemen'      => 'required|string|max:100',
            'pengguna'        => 'nullable|string|max:100',
            'kondisi'         => 'nullable|string|max:50',
            'servis_terakhir' => 'nullable|date',
        ]);

        $aset = Aset::create($validated);

        return response()->json([
            'status'  => 'success',
            'message' => 'Data aset berhasil ditambahkan.',
            'data'    => $aset,
        ], 201);
    }

    public function show(Aset $aset)
    {
        return response()->json([
            'status'  => 'success',
            'message' => 'Detail aset berhasil diambil.',
            'data'    => $aset,
        ], 200);
    }

    public function update(Request $request, Aset $aset)
    {
        $validated = $request->validate([
            'kode'            => 'sometimes|required|string|max:30|unique:asets,kode,' . $aset->id,
            'perangkat'       => 'sometimes|required|string|max:100',
            'departemen'      => 'sometimes|required|string|max:100',
            'pengguna'        => 'nullable|string|max:100',
            'kondisi'         => 'nullable|string|max:50',
            'servis_terakhir' => 'nullable|date',
        ]);

        $aset->update($validated);

        return response()->json([
            'status'  => 'success',
            'message' => 'Data aset berhasil diperbarui.',
            'data'    => $aset,
        ], 200);
    }

    public function destroy(Aset $aset)
    {
        $aset->delete();

        return response()->json([
            'status'  => 'success',
            'message' => 'Data aset berhasil dihapus.',
        ], 200);
    }
}