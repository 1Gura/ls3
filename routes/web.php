<?php

use App\Http\Controllers\ContactsController;
use App\Models\Contact;
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
Route::resource('/contacts', ContactsController::class);

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



//Route::get('/', [ArticlesController::class, 'index'])->name('main.page');

//
//
//Route::post('/articles', [ArticlesController::class, 'store'])->name('articles.store');
//Route::get('/articles/create', [ArticlesController::class, 'create'])->name('articles.create');
//Route::get('/articles/feedback', [ArticlesController::class, 'feedback'])->name('articles.feedback');
//Route::get('/articles/{article:slug}', [ArticlesController::class, 'show'])->name('articles.show');
//Route::get('/articles/{article:slug}/edit', [ArticlesController::class, 'edit'])->name('articles.edit');
//Route::patch('/articles/{article:slug}', [ArticlesController::class, 'update'])->name('articles.update');
//Route::delete('/articles/{article:slug}', [ArticlesController::class, 'delete'])->name('articles.delete');
//Route::get('/admin/', function () {
//    return view('admin.index');
//})->name('admin');
//Route::get('/admin/feedback', function () {
//    $feedbackList = Contact::latest()->get();
//    return view('admin.feedback', compact('feedbackList'));
//})->name('feedback');
//Route::get('/contacts', function () {
//    return view('contacts.index');
//})->name('contacts.index');
//Route::post('/contacts', [ContactsController::class, 'store'])->name('contacts.store');





