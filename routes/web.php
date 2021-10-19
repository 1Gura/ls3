<?php

use App\Http\Controllers\ContactsController;
use App\Models\Contact;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;
Route::get('/', [ArticlesController::class, 'index'])->name('main.page');
Route::get('/about', function () {
    return view('components.about');
})->name('about');

//Route::get('/articles', [ArticlesController::class, 'index']);
Route::post('/articles', [ArticlesController::class, 'store'])->name('articles.store');
Route::get('/articles/create', [ArticlesController::class, 'create'])->name('articles.create');
Route::get('/articles/feedback', [ArticlesController::class, 'feedback'])->name('articles.feedback');
Route::get('/articles/{article}', [ArticlesController::class, 'show'])->name('articles.show');
Route::get('/admin/', function () {
    return view('admin.index');
})->name('admin');
Route::get('/admin/feedback', function () {
    $feedbackList = Contact::latest()->get();
    return view('admin.feedback', compact('feedbackList'));
})->name('feedback');
Route::get('/contacts', function () {
    return view('contacts.index');
})->name('contacts.index');
Route::post('/contacts', [ContactsController::class, 'store'])->name('contacts.store');





