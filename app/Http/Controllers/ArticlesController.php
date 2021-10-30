<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Models\Article;
use App\Models\FormRequest;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
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

    public function update(Article $article, StoreArticleRequest $request)
    {
        $request = $this->completed($request);
        $article->update($request->all());
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

    public function store(StoreArticleRequest $request)
    {
        $request = $this->completed($request);
        Article::create($request->all());
        session()->flash('flash_message', 'Вы успешно создали статью');
        return redirect(route('articles.index'));
    }

    public function completed(StoreArticleRequest $request): StoreArticleRequest
    {
        if (($request['completed'])) {
            $request['completed'] = 1;
        } else {
            $request['completed'] = 0;
        }
        return $request;
    }

    public function incomplete(Article $article)
    {

    }

    public function feedback(): View
    {
        return view('articles.feedback');
    }

}
