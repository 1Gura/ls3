<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\View\View;


class ArticlesController extends Controller
{
    public function index(): View
    {
        $articles = Article::latest()->get();
        return view('welcome', compact('articles'));
    }

    public function show(string $slug): View
    {

        $article = Article::where('slug',$slug)->firstOrFail();

        return view('articles.show', compact('article'));

    }

    public function create(): View
    {
        return view('articles.create');
    }

    public function store()
    {
        $this->validate(\request(), [
            'title' => 'required|min:5',
            'body' => 'required'
        ]);

        $id = optional(Article::latest()->first())->id;
        Article::create(
            array(
                'title' => request('title'),
                'body' => request('body'),
                'slug' => Str::slug(request("title") . ($id !== null ? $id : ""))));

        return redirect('/');
    }

    public function feedback(): View
    {
        return view('articles.feedback');
    }
}
