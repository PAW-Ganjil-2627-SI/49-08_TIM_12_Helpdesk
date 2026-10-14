@extends('layouts.app')

@section('title', 'Aset PC')
@section('lead', 'Daftar komputer dan perangkat per departemen beserta kondisinya, supaya teknisi tahu perangkat mana yang sedang dibahas.')

@section('content')
    @php
        $warna = ['Baik' => 'done', 'Perlu servis' => 'doing', 'Rusak' => 'new'];
    @endphp

    <div class="tools">
        <select id="dept" aria-label="Filter departemen">
            <option value="">Semua departemen</option>
            @foreach ($aset->pluck('departemen')->unique() as $d)
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
                @forelse ($aset as $a)
                    <tr data-dept="{{ $a->departemen }}">
                        <td class="mono">{{ $a->kode }}</td>
                        <td>{{ $a->perangkat }}</td>
                        <td>{{ $a->departemen }}</td>
                        <td>{{ $a->pengguna ?? '-' }}</td>
                        <td><span class="chip {{ $warna[$a->kondisi] ?? '' }}">{{ $a->kondisi }}</span></td>
                        <td>{{ $a->servis_terakhir?->locale('id')->translatedFormat('d M Y') ?? '-' }}</td>
                        <td><a class="textlink" href="{{ route('tickets.create', ['aset' => $a->kode]) }}">Laporkan</a></td>
                    </tr>
                @empty
                    <tr><td colspan="7">Belum ada aset yang terdaftar.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
<script>
    const dept = document.getElementById('dept');
    const baris = [...document.querySelectorAll('tbody tr[data-dept]')];
    dept.addEventListener('change', () => {
        baris.forEach(tr => { tr.hidden = dept.value !== '' && tr.dataset.dept !== dept.value; });
    });
</script>
@endpush