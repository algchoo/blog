<?php

use App\Http\Controllers\BlogPostsController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/author', function () {
    return view('author');
})->name('author');

Route::get('/resume', function () {
    return response()->file(public_path('ageorgiades-resume-2024.pdf'));
})->name('resume');

Route::get('/blog-posts', [BlogPostsController::class, 'index'])->name('blog.index');
Route::get('/blog-posts/{id?}', [BlogPostsController::class, 'blogPost'])->name('blog.post');
