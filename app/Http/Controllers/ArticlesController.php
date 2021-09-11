<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\View\View;
use phpDocumentor\Reflection\Types\Boolean;

class ArticlesController extends Controller
{
    public function index(): View
    {
        $articles = Article::latest()->get();
        return view('welcome', compact('articles'));
    }

    public function show(string $slug): View
    {

        $article = Article::where('slug', $slug)->firstOrFail();

        return view('articles.show', compact('article'));

    }

    public function create(): View
    {
        return view('articles.create');
    }

    public function store()
    {
        $symbolCode = Article::where('symbol_code', request('symbol_code'))->get();
        if(count($symbolCode)) {
            return redirect('articles/create/?codeError=1');
        }
        $this->validate(request(), [
            'symbol_code' => array('required', 'max:100', 'regex:/^[a-z0-9_-]+$/i'),
            'title' => array('required', 'min:5', 'max:100'),
            'description' => array('required', 'max:255'),
            'body' => array('required')
        ]);
        $id = optional(Article::latest()->first())->id;
        Article::create(
            array(
                'symbol_code' => request('symbol_code'),
                'title' => request('title'),
                'description' => request('description'),
                'body' => request('body'),
                'completed' => request('completed') === "on",
                'slug' => Str::slug(request("title") . ($id !== null ? $id : ""))));
        return redirect('/');
    }

    public function feedback(): View
    {
        return view('articles.feedback');
    }
}
