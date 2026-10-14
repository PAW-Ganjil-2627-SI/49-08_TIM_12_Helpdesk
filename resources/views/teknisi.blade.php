@extends('layouts.app')

@section('title', 'Teknisi IT')
@section('lead', 'Siapa yang menangani apa dan bagaimana ketersediaan tiap teknisi hari ini.')

@section('content')
    <div class="tablewrap">
        <table>
            <thead>
                <tr><th>Nama</th><th>Bidang</th><th>Status</th></tr>
            </thead>
            <tbody>
                @forelse ($teknisi as $t)
                    <tr>
                        <td><strong>{{ $t->nama }}</strong></td>
                        <td>{{ $t->spesialisasi ?? '-' }}</td>
                        <td>
                            <span class="chip {{ $t->status === 'tersedia' ? 'done' : ($t->status === 'sibuk' ? 'doing' : '') }}">{{ ucfirst($t->status) }}</span>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="3">Belum ada teknisi yang terdaftar.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection