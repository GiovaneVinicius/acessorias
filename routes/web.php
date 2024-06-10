<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;

Route::get('/login', function () {
    return view('login');
})->name('login');

// ROTAS PARA LOGIN E REGISTRO NO FRONT
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/produtos', function () {
        return view('produtos');
    });
    Route::get('/carrinho', function () {
        return view('carrinho');
    });
    Route::get('/pedidos', function () {
        return view('pedidos');
    });
});