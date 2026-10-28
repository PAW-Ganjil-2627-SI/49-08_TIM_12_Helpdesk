@extends('layouts.app')

@section('title', $artikel->judul . ' – Knowledge Base')

@section('content')
    <div style="max-width:720px">
        <div class="crumb"><a href="{{ route('kb.index') }}">Knowledge Base</a> / {{ $artikel->judul }}</div>

        @if ($artikel->kategoriObj)
            <span class="tag">{{ $artikel->kategoriObj->nama }}</span>
        @elseif ($artikel->kategori)
            <span class="tag">{{ $artikel->kategori }}</span>
        @endif

        <h1 style="margin-top:10px">{{ $artikel->judul }}</h1>

        <div class="steps">
            <h2>Langkah-langkah</h2>
            <ol>
                @foreach ($artikel->daftarLangkah() as $i => $l)
                    <li>{{ $l }}</li>
                @endforeach
            </ol>
        </div>

        <div class="still-stuck">
            <p>Masalah belum selesai setelah mengikuti panduan?</p>
            <a href="{{ route('tickets.create', ['kategori' => $artikel->kategoriObj?->nama ?? $artikel->kategori]) }}"
               class="btn btn-solid">Buat tiket sekarang</a>
            <a href="{{ route('kb.index') }}" class="btn btn-line" style="margin-left:10px">Kembali ke Knowledge Base</a>
        </div>
    </div>
@endsection

@push('styles')
<style>
    .crumb { font-size: 14px; color: var(--muted); margin-bottom: 14px; }
    .crumb a { border-bottom: 1px solid var(--line); }
    .tag { display: inline-block; font-size: 12px; font-weight: 600; padding: 3px 10px; border-radius: 99px; background: var(--brand-tint); color: var(--brand-deep); }
    .steps { background: var(--white); border: 1px solid var(--line); border-radius: 12px; padding: 28px 32px; margin: 24px 0; }
    .steps h2 { font-size: 16px; font-weight: 600; margin: 0 0 16px; color: var(--muted); text-transform: uppercase; letter-spacing: .05em; }
    .steps ol { margin: 0; padding-left: 22px; display: grid; gap: 12px; font-size: 16px; line-height: 1.65; }
    .still-stuck { margin-top: 28px; padding-top: 24px; border-top: 1px solid var(--line); }
    .still-stuck p { color: var(--muted); margin: 0 0 16px; }
    .btn { display: inline-flex; align-items: center; justify-content: center; font-weight: 600; font-size: 15px; padding: 11px 20px; border-radius: 8px; border: 1.5px solid transparent; cursor: pointer; text-decoration: none; }
    .btn-solid { background: var(--brand-deep); color: #fff; }
    .btn-solid:hover { background: #09665a; }
    .btn-line { border-color: var(--ink); color: var(--ink); background: transparent; }
    .btn-line:hover { background: var(--ink); color: #fff; }
</style>
@endpush
