<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\View\View;
use phpDocumentor\Reflection\Types\Boolean;
use Symfony\Component\Console\Input\Input;

class ArticlesController extends Controller
{
    public function index(): View
    {
        $articles = Article::latest()->get();
        return view('articles.index', compact('articles'));
    }

    public function show(Article $article): View
    {
        return view('articles.show', compact('article'));
    }

    public function edit(Article $article): View
    {
        return view('articles.edit', compact('article'));
    }

    public function update(Article $article): Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $body = request()->validate([
            'title' => ['required', 'min:5', 'max:100'],
            'description' => ['required', 'max:255'],
            'body' => ['required'],
            'completed' => [],
        ]);
        $article->update($body);
        session()->flash('flash_message', 'Вы успешно отредактировали статью');

        return redirect('/articles');
    }

    public function destroy(Article $article): Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $article->delete();
        session()->flash('flash_message', 'Вы успешно удалили статью');
        return redirect('/articles');
    }

    public function create(): View
    {
        return view('articles.create');
    }

    public function store(): Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $body = request()->validate([
            'title' => ['required', 'min:5', 'max:100'],
            'description' => ['required', 'max:255'],
            'body' => ['required'],
            'completed' => [],
        ]);
        Article::create($body);
        session()->flash('flash_message', 'Вы успешно создали статью');
        return redirect('/');
    }

    public function feedback(): View
    {
        return view('articles.feedback');
    }
}
