<?php

use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\AuthController;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TeknisiController;
use App\Models\Teknisi;
use App\Http\Controllers\Admin\AsetController;
use App\Models\Aset;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tiket/buat', fn () => view('tickets.create'))->name('tickets.create');

Route::post('/tiket', function (Request $request) {
    $request->validate([
        'nama'       => 'required|string|max:100',
        'departemen' => 'required',
        'kategori'   => 'required',
        'judul'      => 'required|string|max:150',
        'deskripsi'  => 'required|string|min:10',
        'prioritas'  => 'required|in:rendah,sedang,mendesak',
    ]);

    $no = 'TKT-' . str_pad(random_int(1, 9999), 4, '0', STR_PAD_LEFT);

    return redirect()->route('tickets.create')->with('ticket_no', $no);
})->name('tickets.store');

Route::get('/kategori', function () {
    return view('kategori', ['kategori' => Kategori::orderBy('nama')->get()]);
})->name('categories.index');
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('kategori', KategoriController::class)->except('show');
    Route::resource('teknisi', TeknisiController::class)->except('show')->parameters(['teknisi' => 'teknisi']);
});

Route::get('/teknisi', function () {
    return view('teknisi', ['teknisi' => Teknisi::orderBy('nama')->get()]);
})->name('technicians.index');
Route::view('/knowledge-base', 'knowledge-base')->name('kb.index');
Route::get('/aset', function () {
    return view('aset', ['aset' => Aset::orderBy('kode')->get()]);
})->name('assets.index');
Route::get('/masuk', [AuthController::class, 'show'])->name('login')->middleware('guest');
Route::post('/masuk', [AuthController::class, 'login'])->name('login.attempt')->middleware('guest');
Route::post('/daftar', [AuthController::class, 'register'])->name('register.store')->middleware('guest');
Route::post('/keluar', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('kategori', KategoriController::class)->except('show');
    Route::resource('teknisi', TeknisiController::class)->except('show')->parameters(['teknisi' => 'teknisi']);
    Route::resource('aset', AsetController::class)->except('show')->parameters(['aset' => 'aset']);
});