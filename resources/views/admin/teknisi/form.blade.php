@extends('admin.layout')

@section('title', $teknisi->exists ? 'Ubah Teknisi' : 'Tambah Teknisi')

@section('content')
    <div class="judul">
        <h2>{{ $teknisi->exists ? 'Ubah Teknisi' : 'Tambah Teknisi' }}</h2>
    </div>

    <form method="POST" class="form-box"
          action="{{ $teknisi->exists ? route('admin.teknisi.update', $teknisi) : route('admin.teknisi.store') }}">
        @csrf
        @if ($teknisi->exists)
            @method('PUT')
        @endif

        <label for="nama">Nama</label>
        <input type="text" id="nama" name="nama" value="{{ old('nama', $teknisi->nama) }}">
        @error('nama') <div class="error">{{ $message }}</div> @enderror

        <label for="spesialisasi">Spesialisasi</label>
        <input type="text" id="spesialisasi" name="spesialisasi" value="{{ old('spesialisasi', $teknisi->spesialisasi) }}" placeholder="Contoh: Jaringan & Wi-Fi">
        @error('spesialisasi') <div class="error">{{ $message }}</div> @enderror

        <label for="email">Email</label>
        <input type="text" id="email" name="email" value="{{ old('email', $teknisi->email) }}">
        @error('email') <div class="error">{{ $message }}</div> @enderror

        <label for="telepon">Telepon</label>
        <input type="text" id="telepon" name="telepon" value="{{ old('telepon', $teknisi->telepon) }}">
        @error('telepon') <div class="error">{{ $message }}</div> @enderror

        <label for="status">Status</label>
        <select id="status" name="status">
            @foreach (['tersedia', 'sibuk', 'libur'] as $s)
                <option value="{{ $s }}" @selected(old('status', $teknisi->status ?? 'tersedia') === $s)>{{ ucfirst($s) }}</option>
            @endforeach
        </select>
        @error('status') <div class="error">{{ $message }}</div> @enderror

        <div style="margin-top:20px;display:flex;gap:8px;">
            <button type="submit" class="btn">Simpan</button>
            <a href="{{ route('admin.teknisi.index') }}" class="btn abu">Batal</a>
        </div>
    </form>
@endsection