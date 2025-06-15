<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/cadastrar', function(){
    return view('cadastrar_animal');
})->name('cadastrar');

Route::get('/cadastrar-dono', function(){
    return view('cadastrar_dono');
})->name('cadastrar_dono');