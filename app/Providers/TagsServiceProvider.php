<?php

namespace App\Providers;

use App\Models\Tag;
use App\Service\PushAll;
use App\Service\TagsSynchronizer;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class TagsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(TagsSynchronizer::class, function () {
            return new TagsSynchronizer();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layout.sidebar', function (View $view) {
            $view->with('tagsCloud', Tag::tagsCloud());
        });
    }
}
