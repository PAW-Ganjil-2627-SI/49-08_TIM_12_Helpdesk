<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            ['label' => 'Tiket', 'value' => 0, 'warna' => '#2563eb'],
            ['label' => 'Kategori', 'value' => 0, 'warna' => '#16a34a'],
            ['label' => 'Knowledge Base', 'value' => 0, 'warna' => '#9333ea'],
            ['label' => 'Teknisi', 'value' => 0, 'warna' => '#ea580c'],
            ['label' => 'Aset', 'value' => 0, 'warna' => '#0d9488'],
            ['label' => 'Pengguna', 'value' => User::count(), 'warna' => '#4f46e5'],
        ];

        return view('admin.dashboard', compact('stats'));
    }
}