<?php

use Illuminate\Support\Facades\Route;
use App\Models\Article;
use App\Http\Controllers\ArticlesController;
Route::get('/', [ArticlesController::class, 'index']);
Route::get('/about', function () {
    return view('components.about');
});

Route::get('/contacts', function () {
    return view('components.contacts');
});
//Route::get('/articles', [ArticlesController::class, 'index']);
Route::get('/articles/create', [ArticlesController::class, 'create']);
Route::get('/articles/feedback', [ArticlesController::class, 'feedback']);
Route::get('/articles/{slug}', [ArticlesController::class, 'show']);
Route::post('/articles', [ArticlesController::class, 'store']);





