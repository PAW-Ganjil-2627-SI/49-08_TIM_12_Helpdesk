<?php

use App\Http\Controllers\Api\ArtikelController;
use App\Http\Controllers\Api\KategoriController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->prefix('teknisi')->group(function () {
    Route::get('/', [TeknisiController::class, 'index']);
    Route::get('/{teknisi}', [TeknisiController::class, 'show']);
    Route::put('/{teknisi}/status', [TeknisiController::class, 'updateStatus']);
});
Route::get('/kategori', [KategoriController::class, 'index']);
Route::get('/kategori/{kategori}', [KategoriController::class, 'show']);
Route::post('/kategori', [KategoriController::class, 'store']);

Route::get('/knowledge-base', [ArtikelController::class, 'index']);
Route::get('/knowledge-base/{artikel}', [ArtikelController::class, 'show']);
