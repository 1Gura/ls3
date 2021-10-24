<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Step;
use App\Models\Tag;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\View\View;
use phpDocumentor\Reflection\Types\Boolean;
use Ramsey\Collection\Collection;
use Symfony\Component\Console\Input\Input;

class ArticlesController extends Controller
{
    public function index(): View
    {
        $articles = Article::with('tags')->latest()->get();
        $tagsCloud = collect();
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
        $articleTags = $article->tags->keyBy('name');
        $tags = collect(explode(',', request('tags')))->keyBy(function ($item) {
            return $item;
        });
        $syncIds = $articleTags->intersectByKeys($tags)->pluck('id')->toArray();
        $tagsToAttach = $tags->diffKeys($articleTags);
        foreach ($tagsToAttach as $tag) {
            $tag = Tag::firstOrCreate(['name'=>$tag]);
            $syncIds[] = $tag->id;
        }
        $article->tags()->sync($syncIds);
        return redirect('/articles');
    }

    public function destroy(Article $article): Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $article->delete();
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
        return redirect('/');
    }

    public function feedback(): View
    {
        return view('articles.feedback');
    }
}
