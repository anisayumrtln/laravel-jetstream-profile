<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/alats', [App\Http\Controllers\AlatController::class, 'index']);
Route::get('/alat', [App\Http\Controllers\AlatController::class, 'index']);
Route::get('/alat/{id}', [App\Http\Controllers\AlatController::class, 'show']);
Route::post('/midtrans-token', [App\Http\Controllers\MidtransController::class, 'getToken']);


Route::post('/midtrans-callback', [App\Http\Controllers\MidtransController::class, 'handleCallback']);
Route::get('/transaksi', function () {
    return response()->json(\App\Models\Transaksi::with('alat')->latest()->get());
});
