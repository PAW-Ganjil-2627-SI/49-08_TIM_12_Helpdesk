@extends('admin.layout')

@section('title', $artikel->exists ? 'Ubah Artikel' : 'Tambah Artikel')

@section('content')
    <div class="judul">
        <h2>{{ $artikel->exists ? 'Ubah Artikel' : 'Tambah Artikel' }}</h2>
    </div>

    <form method="POST" class="form-box"
          action="{{ $artikel->exists ? route('admin.artikel.update', $artikel) : route('admin.artikel.store') }}">
        @csrf
        @if ($artikel->exists)
            @method('PUT')
        @endif

        <label for="judul">Judul</label>
        <input type="text" id="judul" name="judul" value="{{ old('judul', $artikel->judul) }}" placeholder="Contoh: Printer tidak terdeteksi">
        @error('judul') <div class="error">{{ $message }}</div> @enderror

        <label for="kategori_id">Kategori</label>
        <select id="kategori_id" name="kategori_id">
            <option value="">— Pilih kategori —</option>
            @foreach (\App\Models\Kategori::orderBy('nama')->get() as $k)
                <option value="{{ $k->id }}" {{ old('kategori_id', $artikel->kategori_id) == $k->id ? 'selected' : '' }}>
                    {{ $k->nama }}
                </option>
            @endforeach
        </select>
        @error('kategori_id') <div class="error">{{ $message }}</div> @enderror

        <label for="langkah">Langkah-langkah (satu langkah per baris)</label>
        <textarea id="langkah" name="langkah" rows="8" placeholder="Matikan Wi-Fi, tunggu 10 detik, lalu nyalakan lagi.&#10;Pilih &quot;Lupakan jaringan&quot;, lalu sambungkan ulang.">{{ old('langkah', $artikel->langkah) }}</textarea>
        @error('langkah') <div class="error">{{ $message }}</div> @enderror

        <div style="margin-top:20px;display:flex;gap:8px;">
            <button type="submit" class="btn">Simpan</button>
            <a href="{{ route('admin.artikel.index') }}" class="btn abu">Batal</a>
        </div>
    </form>
@endsection