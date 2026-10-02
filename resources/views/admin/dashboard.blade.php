@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
    <h2>Selamat Datang, {{ auth()->user()->name }}!</h2>
    <p style="color:#64748b;margin-top:6px;">Statistik Sistem</p>

    <div class="grid">
        @foreach ($stats as $s)
            <div class="kartu">
                <div class="ikon" style="background: {{ $s['warna'] }}"></div>
                <div>
                    <small>{{ $s['label'] }}</small>
                    <strong>{{ $s['value'] }}</strong>
                </div>
            </div>
        @endforeach
    </div>
@endsection