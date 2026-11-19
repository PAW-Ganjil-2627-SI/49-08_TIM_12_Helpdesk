@extends('admin.layout')

@section('title', 'Knowledge Base')

@section('content')
    <div class="judul">
        <h2>Knowledge Base</h2>
        <a href="{{ route('admin.artikel.create') }}" class="btn">+ Tambah Artikel</a>
    </div>

    @if (session('sukses'))
        <div class="alert">{{ session('sukses') }}</div>
    @endif

    <table>
        <thead>
            <tr><th>#</th><th>Judul</th><th>Kategori</th><th>Langkah</th><th>Aksi</th></tr>
        </thead>
        <tbody>
            @forelse ($daftar as $a)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $a->judul }}</td>
                    <td>{{ $a->kategoriObj?->nama ?? $a->kategori ?? '-' }}</td>
                    <td>{{ count($a->daftarLangkah()) }} langkah</td>
                    <td class="aksi">
                        <a href="{{ route('admin.artikel.edit', $a) }}" class="btn abu">Ubah</a>
                        <form method="POST" action="{{ route('admin.artikel.destroy', $a) }}" onsubmit="return confirm('Hapus artikel ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn merah">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5">Belum ada artikel.</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection