<?php

use App\Http\Controllers\TodoController;

Route::get('/', [TodoController::class, 'index'])->middleware('auth');
Route::post('/todo', [TodoController::class, 'store'])->middleware('auth');
Route::patch('/todo/{todo}', [TodoController::class, 'update'])->middleware('auth');
Route::delete('/todo/{todo}', [TodoController::class, 'destroy'])->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
