<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlatController;

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
        $totalLokasi = \App\Models\Alat::distinct('lokasi')->count('lokasi');
        $totalMerek  = \App\Models\Alat::distinct('merek')->count('merek');
        $latestAlats = \App\Models\Alat::latest()->take(5)->get();

        return view('dashboard', compact('totalAlat', 'totalLokasi', 'totalMerek', 'latestAlats'));
    })->name('dashboard');
});
