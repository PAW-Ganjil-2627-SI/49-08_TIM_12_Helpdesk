@extends('layouts.app')

@section('title', 'Knowledge Base')
@section('lead', 'Panduan untuk masalah yang sering muncul. Coba dulu langkah-langkahnya, banyak yang selesai tanpa perlu membuat tiket.')

@section('content')
    {{-- Search & filter bar --}}
    <form method="GET" action="{{ route('kb.index') }}" class="tools" role="search">
        <input type="search" id="cari" name="search" value="{{ request('search') }}"
               placeholder="Cari panduan, misalnya: printer" aria-label="Cari panduan">

        <div class="filters" role="group" aria-label="Filter kategori">
            <a href="{{ route('kb.index', array_filter(['search' => request('search')])) }}"
               class="chip {{ !request('kategori_id') ? 'active' : '' }}">Semua</a>
            @foreach ($kategoris as $kat)
                <a href="{{ route('kb.index', array_filter(['search' => request('search'), 'kategori_id' => $kat->id])) }}"
                   class="chip {{ request('kategori_id') == $kat->id ? 'active' : '' }}">{{ $kat->nama }}</a>
            @endforeach
        </div>
    </form>

    <div class="faq">
        @forelse ($artikel as $a)
            <div class="kb-card" data-kb>
                <div class="kb-meta">
                    @if ($a->kategoriObj)
                        <span class="tag">{{ $a->kategoriObj->nama }}</span>
                    @elseif ($a->kategori)
                        <span class="tag">{{ $a->kategori }}</span>
                    @endif
                </div>
                <h3>{{ $a->judul }}</h3>
                <ol class="preview">
                    @foreach (array_slice($a->daftarLangkah(), 0, 2) as $l)
                        <li>{{ $l }}</li>
                    @endforeach
                </ol>
                <div class="kb-actions">
                    <a class="textlink" href="{{ route('kb.show', $a) }}">Baca selengkapnya →</a>
                    <a class="textlink dim" href="{{ route('tickets.create', ['kategori' => $a->kategoriObj?->nama ?? $a->kategori]) }}">Buat tiket</a>
                </div>
            </div>
        @empty
            <p class="empty">Tidak ada panduan yang cocok. Coba kata kunci lain atau <a href="{{ route('tickets.create') }}">buat tiket</a>.</p>
        @endforelse
    </div>
@endsection

@push('styles')
<style>
    .tools { display: flex; flex-direction: column; gap: 14px; margin-bottom: 28px; }
    .tools input[type=search] { width: 100%; max-width: 480px; font: inherit; padding: 11px 16px; border: 1.5px solid #c3cfcb; border-radius: 8px; font-size: 15px; }
    .tools input[type=search]:focus { outline: none; border-color: var(--brand-deep); box-shadow: 0 0 0 3px var(--brand-tint); }
    .filters { display: flex; flex-wrap: wrap; gap: 8px; }
    .chip { display: inline-block; padding: 6px 14px; border-radius: 99px; border: 1.5px solid #c3cfcb; font-size: 13.5px; font-weight: 500; color: var(--muted); background: var(--white); text-decoration: none; transition: all .15s; }
    .chip:hover { border-color: var(--brand-deep); color: var(--brand-deep); }
    .chip.active { border-color: var(--brand-deep); background: var(--brand-tint); color: var(--brand-deep); font-weight: 600; }
    .faq { display: grid; gap: 16px; }
    .kb-card { background: var(--white); border: 1px solid var(--line); border-radius: 12px; padding: 24px 28px; }
    .kb-card:hover { border-color: #9db8b2; }
    .kb-meta { margin-bottom: 6px; }
    .tag { display: inline-block; font-size: 12px; font-weight: 600; padding: 3px 10px; border-radius: 99px; background: var(--brand-tint); color: var(--brand-deep); }
    .kb-card h3 { margin: 0 0 10px; font-size: 17px; font-weight: 600; }
    ol.preview { margin: 0 0 16px; padding-left: 20px; color: var(--muted); font-size: 14.5px; }
    ol.preview li + li { margin-top: 4px; }
    .kb-actions { display: flex; gap: 18px; }
    .textlink { font-weight: 600; color: var(--brand-deep); border-bottom: 1.5px solid var(--brand); text-decoration: none; font-size: 14.5px; }
    .textlink.dim { color: var(--muted); border-color: #c3cfcb; }
    .textlink:hover { opacity: .75; }
    .empty { color: var(--muted); }
</style>
@endpush