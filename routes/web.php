<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function(){
    return view('welcome');

    });

Route::get('/', [\App\Http\Controllers\ManhwaController::class,'index']);
Route::post('/manhwa', [\App\Http\Controllers\ManhwaController::class,'store']);
