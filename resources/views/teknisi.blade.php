@extends('layouts.app')

@section('title', 'Teknisi IT')
@section('lead', 'Siapa yang menangani apa, dan seberapa padat antrean tiap teknisi hari ini. Kapasitas satu teknisi adalah 5 tiket aktif.')

@section('content')
    @php
        $teknisi = [
            ['nama' => 'Rudi Hartono', 'bidang' => 'Jaringan, perangkat keras', 'status' => 'Sibuk', 'tiket' => 4],
            ['nama' => 'Dimas Pratama', 'bidang' => 'Perangkat keras', 'status' => 'Tersedia', 'tiket' => 2],
            ['nama' => 'Sinta Maharani', 'bidang' => 'Akun, perangkat lunak', 'status' => 'Tersedia', 'tiket' => 1],
            ['nama' => 'Bagas Wicaksono', 'bidang' => 'Printer & periferal', 'status' => 'Sibuk', 'tiket' => 5],
        ];
    @endphp

    <div class="tablewrap">
        <table>
            <thead>
                <tr><th>Nama</th><th>Bidang</th><th>Status</th><th>Tiket aktif</th></tr>
            </thead>
            <tbody>
                @foreach ($teknisi as $t)
                    <tr>
                        <td><strong>{{ $t['nama'] }}</strong></td>
                        <td>{{ $t['bidang'] }}</td>
                        <td><span class="chip {{ $t['status'] === 'Tersedia' ? 'done' : 'doing' }}">{{ $t['status'] }}</span></td>
                        <td>
                            <div class="load">
                                <span class="mono">{{ $t['tiket'] }} / 5</span>
                                <div class="bar {{ $t['tiket'] >= 4 ? 'high' : '' }}" role="img" aria-label="{{ $t['tiket'] }} dari 5 tiket"><i style="width: {{ min(100, $t['tiket'] * 20) }}%"></i></div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
