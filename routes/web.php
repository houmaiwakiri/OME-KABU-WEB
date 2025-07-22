<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cookie;

use App\Http\Middleware\TokenAuthMiddleware;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\OrderController;

// ログインページ（ミドルウェアなし）
Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login'])->name('login');

// ログアウト
Route::post('/logout', function () {
    Cookie::queue(Cookie::forget('access_token'));
    return redirect('/login');
})->name('logout');

// 認証が必要なルート（ミドルウェア使用）
Route::middleware([TokenAuthMiddleware::class])->group(function () {
    Route::get('/main', [MainController::class, 'index'])->name('main');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');

    Route::get('/import', [ImportController::class, 'index'])->name('import.index');
    Route::post('/import', [ImportController::class, 'importCsv'])->name('import.csv');
});

// リダイレクト
Route::redirect('/', '/main');