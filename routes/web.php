<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StockController;

Route::get('/', function () {
    return view('register');
});
Route::post("/register",[UserController::class , 'register']);

Route::post('/login',[UserController::class,'login']);

Route::post('/logout',[UserController::class,'logout']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

Route::post("/add-stocks",[DashController::class , 'add_stock'])->name('add.stock');

Route::post('/add-fd', [DashController::class, 'add_fd'])->name('add.fd');
Route::post('/add-property', [DashController::class, 'add_property'])->name('add.property');

Route::get('/dashboard', [DashController::class, 'totalvalue'])->name('dashboard');

Route::get('/mystocks', [StockController::class, 'index'])->name('mystocks');



