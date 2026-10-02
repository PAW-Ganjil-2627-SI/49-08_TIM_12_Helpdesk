@extends('layouts.app')

@section('title', 'Aset PC')
@section('lead', 'Daftar komputer dan perangkat per departemen beserta kondisinya, supaya teknisi tahu perangkat mana yang sedang dibahas.')

@section('content')
    @php
        $aset = collect([
            ['kode' => 'PC-KEU-014', 'perangkat' => 'PC Desktop', 'dept' => 'Keuangan', 'pengguna' => 'Anita', 'kondisi' => 'Baik', 'servis' => '12 Agu 2026'],
            ['kode' => 'PRN-KEU-002', 'perangkat' => 'Printer Laser', 'dept' => 'Keuangan', 'pengguna' => 'Bersama', 'kondisi' => 'Perlu servis', 'servis' => '03 Sep 2026'],
            ['kode' => 'LP-HRD-003', 'perangkat' => 'Laptop', 'dept' => 'HRD', 'pengguna' => 'Maya', 'kondisi' => 'Baik', 'servis' => '20 Jul 2026'],
            ['kode' => 'PC-HRD-007', 'perangkat' => 'PC Desktop', 'dept' => 'HRD', 'pengguna' => 'Fajar', 'kondisi' => 'Baik', 'servis' => '15 Jun 2026'],
            ['kode' => 'LP-PMS-011', 'perangkat' => 'Laptop', 'dept' => 'Pemasaran', 'pengguna' => 'Rina', 'kondisi' => 'Perlu servis', 'servis' => '28 Sep 2026'],
            ['kode' => 'LP-PMS-012', 'perangkat' => 'Laptop', 'dept' => 'Pemasaran', 'pengguna' => 'Bimo', 'kondisi' => 'Baik', 'servis' => '09 Agu 2026'],
            ['kode' => 'PC-OPS-021', 'perangkat' => 'PC Desktop', 'dept' => 'Operasional', 'pengguna' => 'Hendra', 'kondisi' => 'Baik', 'servis' => '01 Sep 2026'],
            ['kode' => 'RTR-OPS-001', 'perangkat' => 'Router Wi-Fi', 'dept' => 'Operasional', 'pengguna' => 'Ruang rapat', 'kondisi' => 'Perlu servis', 'servis' => '22 Sep 2026'],
            ['kode' => 'PC-PRD-030', 'perangkat' => 'PC Desktop', 'dept' => 'Produksi', 'pengguna' => 'Yoga', 'kondisi' => 'Rusak', 'servis' => '30 Sep 2026'],
            ['kode' => 'LP-PRD-031', 'perangkat' => 'Laptop', 'dept' => 'Produksi', 'pengguna' => 'Dewi', 'kondisi' => 'Baik', 'servis' => '18 Agu 2026'],
        ]);
        $warna = ['Baik' => 'done', 'Perlu servis' => 'doing', 'Rusak' => 'new'];
    @endphp

    <div class="tools">
        <select id="dept" aria-label="Filter departemen">
            <option value="">Semua departemen</option>
            @foreach ($aset->pluck('dept')->unique() as $d)
                <option value="{{ $d }}">{{ $d }}</option>
            @endforeach
        </select>
        <span class="sum">{{ $aset->count() }} aset: {{ $aset->where('kondisi', 'Baik')->count() }} baik, {{ $aset->where('kondisi', 'Perlu servis')->count() }} perlu servis, {{ $aset->where('kondisi', 'Rusak')->count() }} rusak</span>
    </div>

    <div class="tablewrap">
        <table>
            <thead>
                <tr><th>Kode</th><th>Perangkat</th><th>Departemen</th><th>Pengguna</th><th>Kondisi</th><th>Servis terakhir</th><th></th></tr>
            </thead>
            <tbody>
                @foreach ($aset as $a)
                    <tr data-dept="{{ $a['dept'] }}">
                        <td class="mono">{{ $a['kode'] }}</td>
                        <td>{{ $a['perangkat'] }}</td>
                        <td>{{ $a['dept'] }}</td>
                        <td>{{ $a['pengguna'] }}</td>
                        <td><span class="chip {{ $warna[$a['kondisi']] }}">{{ $a['kondisi'] }}</span></td>
                        <td>{{ $a['servis'] }}</td>
                        <td><a class="textlink" href="{{ route('tickets.create', ['aset' => $a['kode']]) }}">Laporkan</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
<script>
    const dept = document.getElementById('dept');
    const baris = [...document.querySelectorAll('tbody tr')];
    dept.addEventListener('change', () => {
        baris.forEach(tr => { tr.hidden = dept.value !== '' && tr.dataset.dept !== dept.value; });
    });
</script>
@endpush
