<?php

namespace App\View\Components;

use App\Models\Article;
use Illuminate\View\Component;

class ArticleForm extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $method;
    public $article;

    public function __construct($method, $article = null)
    {
        dd($method, $article);
        $this->method = $method;
        $this->article = $article;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.article-form');
    }
}
