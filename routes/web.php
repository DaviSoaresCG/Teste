<?php

use App\Http\Controllers\AuthController;
use App\Http\Middleware\Authe;
use App\Http\Middleware\Guest;
use App\Http\Middleware\Logado;
use Illuminate\Support\Facades\Route;

Route::middleware([Logado::class])->group(function(){
    Route::get('/', function () {
        return view('home');
    })->name('home');
    
    Route::get('/cadastrar', function(){
        return view('cadastrar_animal');
    })->name('cadastrar');
    
    Route::get('/cadastrar-dono', function(){
        return view('cadastrar_dono');
    })->name('cadastrar_dono');
    
    Route::get('/prontuario', function(){
        return view('prontuario');
    })->name('prontuario');
});

Route::middleware([Guest::class])->group(function(){
    Route::post('/loginSubmit', [AuthController::class, 'loginSubmit'])->name('loginSubmit');

    Route::get('/login', [AuthController::class, 'login'])->name('login');
});

Route::fallback(function(){
    return view('fallback');
});

Route::get('/update', [AuthController::class, 'updateAdmin']);

