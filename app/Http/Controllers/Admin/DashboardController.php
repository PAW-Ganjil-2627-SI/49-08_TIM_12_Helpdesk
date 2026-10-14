<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\Aset;
use App\Models\Kategori;
use App\Models\Teknisi;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            ['label' => 'Tiket', 'value' => 0, 'warna' => '#2563eb'],
            ['label' => 'Kategori', 'value' => Kategori::count(), 'warna' => '#16a34a'],
            ['label' => 'Knowledge Base', 'value' => Artikel::count(), 'warna' => '#9333ea'],
            ['label' => 'Teknisi', 'value' => Teknisi::count(), 'warna' => '#ea580c'],
            ['label' => 'Aset', 'value' => Aset::count(), 'warna' => '#0d9488'],
            ['label' => 'Pengguna', 'value' => User::count(), 'warna' => '#4f46e5'],
        ];

        return view('admin.dashboard', compact('stats'));
    }
}