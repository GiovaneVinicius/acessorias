<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/login', function () {
    return view('login');
})->name('login');


Route::post('/registerNoApi', [AuthController::class, 'register']);
Route::post('/loginNoApi', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/produtos', function () {
        return view('produtos'); 
    });
});