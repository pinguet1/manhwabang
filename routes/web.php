<?php

use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\ManhwaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\Manhwa;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);

Route::post('/manhwas', [\App\Http\Controllers\ManhwaController::class, 'store']);

Route::get('/manhwa/{manhwa}', [ManhwaController::class, 'show']);

Route::post('/thoughts', [\App\Http\Controllers\ThoughtController::class, 'store'])
->middleware('auth')
    ->name('thoughts.store');

Route::get('/register',[RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [\App\Http\Controllers\SessionController::class, 'create'])->name('login');
Route::post('/login', [\App\Http\Controllers\SessionController::class, 'store']);
Route::post('/logout', [\App\Http\Controllers\SessionController::class, 'destroy'])->name('logout');
