<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/alats', [App\Http\Controllers\AlatController::class, 'index']);
Route::get('/alat', [App\Http\Controllers\AlatController::class, 'index']);
Route::get('/alat/{id}', [App\Http\Controllers\AlatController::class, 'show']);

