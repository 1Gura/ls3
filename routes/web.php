<?php

use App\Http\Controllers\ContactsController;
use App\Models\Contact;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;
Route::get('/', [ArticlesController::class, 'index']);
Route::get('/about', function () {
    return view('components.about');
});

//Route::get('/articles', [ArticlesController::class, 'index']);
Route::get('/articles/create', [ArticlesController::class, 'create']);
Route::get('/articles/feedback', [ArticlesController::class, 'feedback']);
Route::get('/articles/{slug}', [ArticlesController::class, 'show']);
Route::get('/admin/', function () {
    return view('admin.index');
});
Route::get('/admin/feedback', function () {
    $feedbackList = Contact::latest()->get();
    return view('admin.feedback', compact('feedbackList'));
});
Route::post('/articles', [ArticlesController::class, 'store']);
Route::get('/contacts', function () {
    return view('contacts.index');
});
Route::post('/contacts', [ContactsController::class, 'store']);





