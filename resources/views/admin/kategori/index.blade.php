@extends('admin.layout')

@section('title', 'Kategori')

@section('content')
    <div class="judul">
        <h2>Kategori</h2>
        <a href="{{ route('admin.kategori.create') }}" class="btn">+ Tambah Kategori</a>
    </div>

    @if (session('sukses'))
        <div class="alert">{{ session('sukses') }}</div>
    @endif

    <table>
        <thead>
            <tr><th>#</th><th>Nama</th><th>Deskripsi</th><th>Aksi</th></tr>
        </thead>
        <tbody>
            @forelse ($kategori as $k)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $k->nama }}</td>
                    <td>{{ $k->deskripsi ?? '-' }}</td>
                    <td class="aksi">
                        <a href="{{ route('admin.kategori.edit', $k) }}" class="btn abu">Ubah</a>
                        <form method="POST" action="{{ route('admin.kategori.destroy', $k) }}" onsubmit="return confirm('Hapus kategori ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn merah">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4">Belum ada kategori.</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection