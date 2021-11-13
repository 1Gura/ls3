<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function index(Tag $tag): Factory|View|Application
    {
        $articles = $tag->articles()->with('tags')->get();
        return view('articles.index', compact('articles'));
    }
}
