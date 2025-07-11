<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/logs', [LogController::class, 'index'])->name('logs.index');
Route::get('/logs/{filename}', [LogController::class, 'show'])->name('logs.show');
