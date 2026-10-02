<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::view('/kategori', 'kategori')->name('categories.index');
Route::view('/teknisi', 'teknisi')->name('technicians.index');
Route::view('/knowledge-base', 'knowledge-base')->name('kb.index');
Route::view('/aset', 'aset')->name('assets.index');
Route::get('/masuk', [AuthController::class, 'show'])->name('login')->middleware('guest');
Route::post('/masuk', [AuthController::class, 'login'])->name('login.attempt')->middleware('guest');
Route::post('/daftar', [AuthController::class, 'register'])->name('register.store')->middleware('guest');
Route::post('/keluar', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});