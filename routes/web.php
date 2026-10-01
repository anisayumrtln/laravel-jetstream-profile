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
        return view('dashboard');
    })->name('dashboard');
});
