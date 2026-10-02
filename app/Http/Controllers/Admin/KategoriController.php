<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::latest()->get();

        return view('admin.kategori.index', compact('kategori'));
    }

    public function create()
    {
        return view('admin.kategori.form', ['kategori' => new Kategori()]);
    }

    public function store(Request $request)
    {
        Kategori::create($this->validasi($request));

        return redirect()->route('admin.kategori.index')->with('sukses', 'Kategori berhasil ditambahkan.');
    }

    public function edit(Kategori $kategori)
    {
        return view('admin.kategori.form', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $kategori->update($this->validasi($request, $kategori->id));

        return redirect()->route('admin.kategori.index')->with('sukses', 'Kategori berhasil diubah.');
    }

    public function destroy(Kategori $kategori)
    {
        $kategori->delete();

        return redirect()->route('admin.kategori.index')->with('sukses', 'Kategori berhasil dihapus.');
    }

    private function validasi(Request $request, $id = null): array
    {
        return $request->validate([
            'nama'      => 'required|string|max:100|unique:kategoris,nama,' . $id,
            'deskripsi' => 'nullable|string|max:500',
            'contoh'    => 'nullable|string|max:255',
        ], [
            'nama.required' => 'Nama kategori wajib diisi.',
            'nama.unique'   => 'Nama kategori sudah ada.',
        ]);
    }
}