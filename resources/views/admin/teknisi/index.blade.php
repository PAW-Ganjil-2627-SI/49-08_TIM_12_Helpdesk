@extends('admin.layout')

@section('title', 'Teknisi')

@section('content')
    <div class="judul">
        <h2>Teknisi</h2>
        <a href="{{ route('admin.teknisi.create') }}" class="btn">+ Tambah Teknisi</a>
    </div>

    @if (session('sukses'))
        <div class="alert">{{ session('sukses') }}</div>
    @endif

    <table>
        <thead>
            <tr><th>#</th><th>Nama</th><th>Spesialisasi</th><th>Kontak</th><th>Status</th><th>Aksi</th></tr>
        </thead>
        <tbody>
            @forelse ($teknisi as $t)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $t->nama }}</td>
                    <td>{{ $t->spesialisasi ?? '-' }}</td>
                    <td>{{ $t->email ?? '-' }}<br><small>{{ $t->telepon }}</small></td>
                    <td>{{ ucfirst($t->status) }}</td>
                    <td class="aksi">
                        <a href="{{ route('admin.teknisi.edit', $t) }}" class="btn abu">Ubah</a>
                        <form method="POST" action="{{ route('admin.teknisi.destroy', $t) }}" onsubmit="return confirm('Hapus teknisi ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn merah">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6">Belum ada teknisi.</td></tr>
            @endforelse
        </tbody>
    </table>
@endsection