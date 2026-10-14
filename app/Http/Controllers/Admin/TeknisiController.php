<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teknisi;
use Illuminate\Http\Request;

class TeknisiController extends Controller
{
    public function index()
    {
        $teknisi = Teknisi::latest()->get();

        return view('admin.teknisi.index', compact('teknisi'));
    }

    public function create()
    {
        return view('admin.teknisi.form', ['teknisi' => new Teknisi()]);
    }

    public function store(Request $request)
    {
        Teknisi::create($this->validasi($request));

        return redirect()->route('admin.teknisi.index')->with('sukses', 'Teknisi berhasil ditambahkan.');
    }

    public function edit(Teknisi $teknisi)
    {
        return view('admin.teknisi.form', compact('teknisi'));
    }

    public function update(Request $request, Teknisi $teknisi)
    {
        $teknisi->update($this->validasi($request));

        return redirect()->route('admin.teknisi.index')->with('sukses', 'Teknisi berhasil diubah.');
    }

    public function destroy(Teknisi $teknisi)
    {
        $teknisi->delete();

        return redirect()->route('admin.teknisi.index')->with('sukses', 'Teknisi berhasil dihapus.');
    }

    private function validasi(Request $request): array
    {
        return $request->validate([
            'nama'         => 'required|string|max:100',
            'spesialisasi' => 'nullable|string|max:100',
            'email'        => 'nullable|email|max:150',
            'telepon'      => 'nullable|string|max:20',
            'status'       => 'required|in:tersedia,sibuk,libur',
        ], [
            'nama.required' => 'Nama teknisi wajib diisi.',
            'email.email'   => 'Format email belum benar.',
        ]);
    }
}