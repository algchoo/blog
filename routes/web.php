<?php

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/author', function () {
    return view('author');
})->name('author');

Route::get('/blog-posts', [BlogPostsController::class, 'index'])->name('blog.index');
Route::get('/blog-posts/{id?}', [BlogPostsController::class, 'blogPost'])->name('blog.post');
