<?php

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\TokenAuthMiddleware;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;

// ログインページ（ミドルウェアなし）
Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login']);

// ログアウト
Route::get('/logout', [AuthController::class, 'logout']);

// 認証が必要なルート（ミドルウェア付き）
Route::middleware([TokenAuthMiddleware::class])->group(function () {
    Route::get('/main', [MainController::class, 'index']);
    // Route::get('/order', [OrderController::class, 'index']);
    // Route::get('/csv', [CsvController::class, 'index']);
});