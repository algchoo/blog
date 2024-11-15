<?php

use App\Http\Controllers\TodoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ResumeController;

Auth::routes();

Route::get('/', [TodoController::class, 'index'])->middleware('auth');
Route::post('/todo', [TodoController::class, 'store'])->middleware('auth');
Route::patch('/todo/{todo}', [TodoController::class, 'update'])->middleware('auth');
Route::delete('/todo/{todo}', [TodoController::class, 'destroy'])->middleware('auth');

Route::get('/resume', [ResumeController::class, 'show'])->name('resume.show');

Route::post('/resume/rate', [ResumeController::class, 'rateResume'])->name('resume.rateResume');

Route::get('/home', [HomeController::class, 'index'])->name('home');
