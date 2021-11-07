<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Models\Article;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class ArticlesController extends Controller
{
    public function index(): View
    {
        $articles = Article::latest()->get();
        return view('articles.index', compact('articles'));
    }

    public function show(Article $article, Filesystem $fileSystem): View
    {
        return view('articles.show', compact('article'));
    }

    public function edit(Article $article): View
    {
        return view('articles.edit', compact('article'));
    }

    public function update(Article $article, StoreArticleRequest $request): Redirector|Application|RedirectResponse
    {
        $params = $request->validated();
        $article->update($params);
        session()->flash('flash_message', 'Вы успешно отредактировали статью');
        return redirect(route('articles.index'));
    }

    public function destroy(Article $article): string
    {
        $article->delete();
        session()->flash('flash_message', 'Вы успешно удалили статью');
        return redirect(route('articles.index'));
    }

    public function create(): View
    {
        return view('articles.create');
    }

    public function store(StoreArticleRequest $request): Redirector|Application|RedirectResponse
    {
        $params = $request->validated();
        Article::create($params);
        session()->flash('flash_message', 'Вы успешно создали статью');
        return redirect(route('articles.index'));
    }

    public function incomplete(Article $article)
    {

    }
}
