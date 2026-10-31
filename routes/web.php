<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlatController;
use App\Http\Controllers\TransaksiController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('alat', AlatController::class);

Route::middleware([
    'auth',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        $totalAlat   = \App\Models\Alat::count();
        $totalUnit   = (int) \App\Models\Alat::sum('stok');
        $totalLokasi = \App\Models\Alat::distinct('lokasi')->count('lokasi');
        $totalMerek  = \App\Models\Alat::distinct('merek')->count('merek');
        $latestAlats = \App\Models\Alat::latest()->take(6)->get();

        return view('dashboard', compact('totalAlat', 'totalUnit', 'totalLokasi', 'totalMerek', 'latestAlats'));
    })->name('dashboard');

    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::post('/transaksi/{id}/mark-success', [TransaksiController::class, 'markSuccess'])->name('transaksi.markSuccess');
    Route::post('/transaksi/{id}/mark-failed', [TransaksiController::class, 'markFailed'])->name('transaksi.markFailed');
});
