<?php

namespace App\Providers;

use App\PriceFormatter;
use App\Service\OtherPriceFormatter;
use App\Service\PushAll;
use Illuminate\Support\ServiceProvider;

class PushAllServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PriceFormatter::class, function() {
            return new OtherPriceFormatter();
        });

        $this->app->singleton(PushAll::class, function () {
            return new PushAll(config('my-config.pushall.key'));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
