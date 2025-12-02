<?php

use App\Http\Controllers\RegisteredUserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\Manhwa;

Route::get('/', function(){
    return view('home');

    });

    Route::get('/test', function () {
        return view('test', [
            'manhwas' => Manhwa::with('genres')->get()
        ]);
    });

Route::get('/register',[RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [\App\Http\Controllers\SessionController::class, 'create'])->name('login');
Route::post('/login', [\App\Http\Controllers\SessionController::class, 'store']);
Route::post('/logout', [\App\Http\Controllers\SessionController::class, 'destroy'])->name('logout');


