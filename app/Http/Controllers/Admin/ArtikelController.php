<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index()
    {
        $daftar = Artikel::latest()->get();

        return view('admin.artikel.index', compact('daftar'));
    }

    public function create()
    {
        return view('admin.artikel.form', ['artikel' => new Artikel()]);
    }

    public function store(Request $request)
    {
        Artikel::create($this->validasi($request));

        return redirect()->route('admin.artikel.index')->with('sukses', 'Artikel berhasil ditambahkan.');
    }

    public function edit(Artikel $artikel)
    {
        return view('admin.artikel.form', compact('artikel'));
    }

    public function update(Request $request, Artikel $artikel)
    {
        $artikel->update($this->validasi($request));

        return redirect()->route('admin.artikel.index')->with('sukses', 'Artikel berhasil diubah.');
    }

    public function destroy(Artikel $artikel)
    {
        $artikel->delete();

        return redirect()->route('admin.artikel.index')->with('sukses', 'Artikel berhasil dihapus.');
    }

    private function validasi(Request $request): array
    {
        return $request->validate([
            'judul'       => 'required|string|max:150',
            'kategori_id' => 'required|exists:kategoris,id',
            'langkah'     => 'required|string',
        ], [
            'judul.required'        => 'Judul wajib diisi.',
            'kategori_id.required'  => 'Kategori wajib dipilih.',
            'kategori_id.exists'    => 'Kategori tidak valid.',
            'langkah.required'      => 'Langkah-langkah wajib diisi.',
        ]);
    }
}