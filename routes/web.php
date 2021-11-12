<?php

use App\Http\Controllers\ContactsController;
use App\Http\Controllers\TestController;
use App\Http\Middleware\CustomAuthenticate;
use App\Models\Contact;
use App\PriceFormatter;
use App\Service\OtherPriceFormatter;
use App\Service\PushAll;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;

/*
 * GET/tasks (index)
 * GET/tasks/create (create) - форма создания
 * GET/Tasks/:id (show) - получить конкретную задачу
 * GET/Tasks/:id/edit (edit) - редактировать задачу
 * POST/tasks (store)
 * PUT/tasks (update)
 * PATCH/tasks/:id (update) чаще юзают
 * DELETE/tasks/:id (delete)
 * */

Route::resource('/articles', ArticlesController::class);
Route::get('/contacts', function () {
    return view('contacts.index');
})->name('contacts.index');
Route::post('/contacts', [ContactsController::class, 'store'])->name('contacts.store');
Route::get('/', [ArticlesController::class, 'index'])->name('index');

Route::get('/about', function () {
    return view('components.about');
})->name('about');

Route::get('/admin/', function () {
    return view('admin.index');
})->name('admin');

Route::get('/admin/feedback', function () {
    $feedbackList = Contact::latest()->get();
    return view('admin.feedback', compact('feedbackList'));
})->name('feedback');





