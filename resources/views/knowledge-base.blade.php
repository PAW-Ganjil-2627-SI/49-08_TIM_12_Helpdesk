@extends('layouts.app')

@section('title', 'Knowledge Base')
@section('lead', 'Panduan untuk masalah yang sering muncul. Coba dulu langkah-langkahnya, banyak yang selesai tanpa perlu membuat tiket.')

@section('content')
    <div class="tools">
        <input type="search" id="cari" placeholder="Cari panduan, misalnya: printer" aria-label="Cari panduan">
    </div>

    <div class="faq">
        @forelse ($artikel as $a)
            <details data-kb>
                <summary>{{ $a->judul }}</summary>
                <div class="body">
                    <ol>
                        @foreach ($a->daftarLangkah() as $l)
                            <li>{{ $l }}</li>
                        @endforeach
                    </ol>
                    <a class="textlink" href="{{ route('tickets.create', ['kategori' => $a->kategori]) }}">Masih bermasalah? Buat tiket</a>
                </div>
            </details>
        @empty
            <p class="empty">Belum ada panduan yang tersedia.</p>
        @endforelse
    </div>
    <p class="empty" id="kosong" hidden>Tidak ada panduan yang cocok. Coba kata kunci lain, atau buat tiket baru.</p>
@endsection

@push('scripts')
<script>
    const cari = document.getElementById('cari');
    const items = [...document.querySelectorAll('[data-kb]')];
    const kosong = document.getElementById('kosong');
    cari.addEventListener('input', () => {
        const q = cari.value.trim().toLowerCase();
        let ada = 0;
        items.forEach(el => {
            const cocok = el.textContent.toLowerCase().includes(q);
            el.hidden = !cocok;
            if (cocok) ada++;
        });
        kosong.hidden = ada > 0 || items.length === 0;
    });
</script>
@endpush