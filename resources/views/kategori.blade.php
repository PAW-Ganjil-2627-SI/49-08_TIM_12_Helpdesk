@extends('layouts.app')

@section('title', 'Kategori Masalah')
@section('lead', 'Pilih kategori yang paling dekat dengan masalah Anda. Tiket yang masuk ke kategori yang tepat ditangani lebih cepat.')

@section('content')
    <div class="items">
        @forelse ($kategori as $k)
            <div class="item">
                <h3>{{ $k->nama }}</h3>
                <div>
                    <p>{{ $k->deskripsi }}</p>
                    @if ($k->contoh)
                        <p class="ex">Contoh: {{ $k->contoh }}</p>
                    @endif
                </div>
                <div class="side">
                    <a class="textlink" href="{{ route('tickets.create', ['kategori' => $k->nama]) }}">Buat tiket</a>
                </div>
            </div>
        @empty
            <p>Belum ada kategori.</p>
        @endforelse
    </div>
@endsection