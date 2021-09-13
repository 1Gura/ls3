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
        return view('welcome', compact('articles'));
    }

    public function show(Article $article): View
    {
        return view('articles.show', compact('article'));
    }

    public function create(): View
    {
        return view('articles.create');
    }

    public function store()
    {
        $body = $this->validate(request(), [
            'symbol_code' => ['required', 'max:100', 'regex:/^[a-z0-9_-]+$/i', 'unique:articles'],
            'title' => ['required', 'min:5', 'max:100'],
            'description' => ['required', 'max:255'],
            'body' => ['required'],
            'completed' => [],
        ]);
        $id = optional(Article::latest()->first())->id;
        Article::create(
            array(
                'symbol_code' => $body['symbol_code'],
                'title' => $body['title'],
                'description' => $body['description'],
                'body' => $body['body'],
                'completed' => request('completed') === "on",
                'slug' => Str::slug($body["title"] . ($id !== null ? $id : ""))));
        return redirect('/');
    }

    public function feedback(): View
    {
        return view('articles.feedback');
    }
}
