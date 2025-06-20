<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\VendaController;
use App\Http\Middleware\Authe;
use App\Http\Middleware\Guest;
use App\Http\Middleware\Logado;
use Illuminate\Support\Facades\Route;

Route::middleware([Logado::class])->group(function () {

    Route::get('/cadastrar-produto', [ProdutoController::class, 'cadastrar'])->name('cadastrar_produto');
    Route::post(('/cadastrar-produto'), [ProdutoController::class, 'cadastrarSubmit'])->name('cadastrar_produto_submit');
    Route::get('/produto/preco/{id}', [ProdutoController::class, 'preco'])->name('produto.preco');


    Route::get('/cadastrar-cliente', [ClienteController::class, 'cadastrar'])->name('cadastrar_cliente');
    Route::post('/cadastrar-cliente', [ClienteController::class, 'cadastrarSubmit'])->name('cadastrar_cliente_submit');

    Route::get('/', [VendaController::class, 'index'])->name('venda');
    Route::get('/venda', [VendaController::class, 'create'])->name('venda.create');
    Route::post('/forma-pagamento', [VendaController::class, 'formaDePagamento'])->name('venda.forma_pagamento');

    Route::post('/finalizar-venda', [VendaController::class, 'finalizarVenda'])->name('venda.finalizar_venda');
    Route::get('/edit/{id}', [VendaController::class, 'edit'])->name('venda.edit');
    Route::post('/edit-submit', [VendaController::class, 'editSubmit'])->name('venda.edit_submit');
    Route::get('/delete/{id}', [VendaController::class, 'delete'])->name('venda.delete');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware([Guest::class])->group(function () {
    Route::get('/cadastrar', [AuthController::class, 'cadastrar'])->name('cadastrar');
    Route::post('/cadastrar-submit', [AuthController::class, 'cadastrarSubmit'])->name('cadastrar.submit');
    Route::post('/loginSubmit', [AuthController::class, 'loginSubmit'])->name('loginSubmit');

    Route::get('/login', [AuthController::class, 'login'])->name('login');
});

Route::fallback(function () {
    return view('fallback');
});
