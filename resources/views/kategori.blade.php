@extends('layouts.app')

@section('title', 'Kategori Masalah')
@section('lead', 'Pilih kategori yang paling dekat dengan masalah Anda. Tiket yang masuk ke kategori yang tepat ditangani lebih cepat.')

@section('content')
    @php
        $kategori = [
            ['nama' => 'Jaringan & Wi-Fi', 'desc' => 'Koneksi internet, Wi-Fi, VPN, dan jaringan kantor.', 'contoh' => 'Wi-Fi putus-putus, tidak bisa membuka server internal.', 'aktif' => 3],
            ['nama' => 'Perangkat keras', 'desc' => 'PC, laptop, monitor, dan komponen di dalamnya.', 'contoh' => 'Laptop restart sendiri, layar tidak menyala.', 'aktif' => 5],
            ['nama' => 'Perangkat lunak', 'desc' => 'Instalasi, pembaruan, dan error pada aplikasi.', 'contoh' => 'Aplikasi tidak bisa dibuka setelah update.', 'aktif' => 2],
            ['nama' => 'Akun & email', 'desc' => 'Kata sandi, akses sistem, dan email kantor.', 'contoh' => 'Lupa kata sandi, akun terkunci.', 'aktif' => 1],
            ['nama' => 'Printer & periferal', 'desc' => 'Printer, pemindai, mouse, keyboard, dan perangkat tambahan.', 'contoh' => 'Printer tidak terdeteksi, hasil cetak bergaris.', 'aktif' => 2],
        ];
    @endphp

    <div class="items">
        @foreach ($kategori as $k)
            <div class="item">
                <h3>{{ $k['nama'] }}</h3>
                <div>
                    <p>{{ $k['desc'] }}</p>
                    <p class="ex">Contoh: {{ $k['contoh'] }}</p>
                </div>
                <div class="side">
                    <span class="count">{{ $k['aktif'] }} tiket aktif</span>
                    <a class="textlink" href="{{ route('tickets.create', ['kategori' => $k['nama']]) }}">Buat tiket</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
