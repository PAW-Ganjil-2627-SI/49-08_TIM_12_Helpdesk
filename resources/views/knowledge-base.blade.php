@extends('layouts.app')

@section('title', 'Knowledge Base')
@section('lead', 'Panduan untuk masalah yang sering muncul. Coba dulu langkah-langkahnya, banyak yang selesai tanpa perlu membuat tiket.')

@section('content')
    @php
        $artikel = [
            ['judul' => 'Wi-Fi terhubung tetapi tidak ada internet', 'kategori' => 'Jaringan & Wi-Fi', 'langkah' => ['Matikan Wi-Fi, tunggu 10 detik, lalu nyalakan lagi.', 'Pilih "Lupakan jaringan", lalu sambungkan ulang dengan kata sandi.', 'Coba buka situs lain. Kalau semua perangkat di ruangan sama-sama gagal, masalahnya di jaringan.']],
            ['judul' => 'Printer tidak terdeteksi', 'kategori' => 'Printer & periferal', 'langkah' => ['Pastikan printer menyala dan kabel USB atau jaringannya terpasang.', 'Cabut kabel, tunggu sebentar, pasang kembali.', 'Mulai ulang komputer, lalu coba cetak halaman uji.']],
            ['judul' => 'Lupa kata sandi email kantor', 'kategori' => 'Akun & email', 'langkah' => ['Klik "Lupa kata sandi" di halaman masuk email.', 'Ikuti tautan pemulihan yang dikirim ke nomor atau email cadangan.', 'Kalau tidak ada akses ke keduanya, buat tiket agar teknisi mengatur ulang akun Anda.']],
            ['judul' => 'Laptop lambat atau sering macet', 'kategori' => 'Perangkat keras', 'langkah' => ['Tutup aplikasi dan tab browser yang tidak dipakai.', 'Mulai ulang laptop. Kebanyakan laptop yang jarang dimatikan jadi melambat.', 'Cek sisa ruang penyimpanan. Kalau hampir penuh, hapus berkas yang tidak perlu.']],
            ['judul' => 'Layar komputer tidak menyala', 'kategori' => 'Perangkat keras', 'langkah' => ['Pastikan kabel daya dan kabel layar terpasang kencang di kedua ujung.', 'Tekan tombol daya monitor dan cek apakah lampu indikatornya menyala.', 'Kalau PC menyala tetapi layar tetap gelap, buat tiket dan sebutkan kode asetnya.']],
            ['judul' => 'Aplikasi tidak bisa dibuka setelah pembaruan', 'kategori' => 'Perangkat lunak', 'langkah' => ['Tutup aplikasi sepenuhnya, lalu buka lagi.', 'Mulai ulang komputer.', 'Catat pesan error yang muncul dan lampirkan di tiket kalau masih gagal.']],
        ];
    @endphp

    <div class="tools">
        <input type="search" id="cari" placeholder="Cari panduan, misalnya: printer" aria-label="Cari panduan">
    </div>

    <div class="faq">
        @foreach ($artikel as $a)
            <details data-kb>
                <summary>{{ $a['judul'] }}</summary>
                <div class="body">
                    <ol>
                        @foreach ($a['langkah'] as $l)
                            <li>{{ $l }}</li>
                        @endforeach
                    </ol>
                    <a class="textlink" href="{{ route('tickets.create', ['kategori' => $a['kategori']]) }}">Masih bermasalah? Buat tiket</a>
                </div>
            </details>
        @endforeach
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
        kosong.hidden = ada > 0;
    });
</script>
@endpush
