<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Aset;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AsetController extends Controller
{
    public function index()
    {
        $daftar = Aset::orderBy('kode')->get();

        return view('admin.aset.index', compact('daftar'));
    }

    public function create()
    {
        return view('admin.aset.form', ['aset' => new Aset()]);
    }

    public function store(Request $request)
    {
        Aset::create($this->validasi($request));

        return redirect()->route('admin.aset.index')->with('sukses', 'Aset berhasil ditambahkan.');
    }

    public function edit(Aset $aset)
    {
        return view('admin.aset.form', compact('aset'));
    }

    public function update(Request $request, Aset $aset)
    {
        $aset->update($this->validasi($request, $aset));

        return redirect()->route('admin.aset.index')->with('sukses', 'Aset berhasil diubah.');
    }

    public function destroy(Aset $aset)
    {
        $aset->delete();

        return redirect()->route('admin.aset.index')->with('sukses', 'Aset berhasil dihapus.');
    }

    private function validasi(Request $request, ?Aset $aset = null): array
    {
        return $request->validate([
            'kode'            => ['required', 'string', 'max:30', Rule::unique('asets', 'kode')->ignore($aset?->id)],
            'perangkat'       => 'required|string|max:100',
            'departemen'      => 'required|string|max:100',
            'pengguna'        => 'nullable|string|max:100',
            'kondisi'         => 'required|in:Baik,Perlu servis,Rusak',
            'servis_terakhir' => 'nullable|date',
        ], [
            'kode.required'       => 'Kode aset wajib diisi.',
            'kode.unique'         => 'Kode aset sudah dipakai.',
            'perangkat.required'  => 'Jenis perangkat wajib diisi.',
            'departemen.required' => 'Departemen wajib diisi.',
            'servis_terakhir.date' => 'Format tanggal belum benar.',
        ]);
    }
}