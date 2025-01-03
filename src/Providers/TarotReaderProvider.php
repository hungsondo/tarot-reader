<?php

namespace Hungsondo\TarotReader\Providers;

use Illuminate\Support\ServiceProvider;

class TarotReaderProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../views', 'tarot-reader');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
// Register method left empty for now