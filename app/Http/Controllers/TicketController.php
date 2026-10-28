<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\Kategori;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function create()
    {
        return view('tickets.create', [
            'kategoris' => Kategori::orderBy('nama')->get(),
            'asets'     => Aset::orderBy('kode')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama'       => 'required|string|max:100',
            'departemen' => 'required|string',
            'kategori'   => 'required|string',
            'aset'       => 'nullable|string|max:30',
            'judul'      => 'required|string|max:150',
            'deskripsi'  => 'required|string|min:10',
            'prioritas'  => 'required|in:rendah,sedang,mendesak',
        ]);

        $prefix  = 'TKT-' . now()->format('Ym');
        $last    = Ticket::where('no_tiket', 'like', $prefix . '-%')
                         ->orderByDesc('no_tiket')
                         ->value('no_tiket');
        $seq     = $last ? ((int) substr($last, -4)) + 1 : 1;
        $data['no_tiket'] = $prefix . '-' . str_pad($seq, 4, '0', STR_PAD_LEFT);

        Ticket::create($data);

        return redirect()->route('tickets.create')
                         ->with('ticket_no', $data['no_tiket']);
    }
}
