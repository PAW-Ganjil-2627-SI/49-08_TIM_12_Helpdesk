@extends('admin.layout')

@section('title', $kategori->exists ? 'Ubah Kategori' : 'Tambah Kategori')

@section('content')
    <div class="judul">
        <h2>{{ $kategori->exists ? 'Ubah Kategori' : 'Tambah Kategori' }}</h2>
    </div>

    <form method="POST" class="form-box"
          action="{{ $kategori->exists ? route('admin.kategori.update', $kategori) : route('admin.kategori.store') }}">
        @csrf
        @if ($kategori->exists)
            @method('PUT')
        @endif

        <label for="nama">Nama</label>
        <input type="text" id="nama" name="nama" value="{{ old('nama', $kategori->nama) }}">
        @error('nama') <div class="error">{{ $message }}</div> @enderror

        <label for="deskripsi">Deskripsi</label>
        <textarea id="deskripsi" name="deskripsi" rows="4">{{ old('deskripsi', $kategori->deskripsi) }}</textarea>
        @error('deskripsi') <div class="error">{{ $message }}</div> @enderror

        <div style="margin-top:20px;display:flex;gap:8px;">
            <button type="submit" class="btn">Simpan</button>
            <a href="{{ route('admin.kategori.index') }}" class="btn abu">Batal</a>
        </div>
    </form>
@endsection