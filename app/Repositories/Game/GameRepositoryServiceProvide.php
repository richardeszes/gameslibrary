<?php

namespace App\Repositories\Game;

use Illuminate\Support\ServiceProvider;

class GameRepositoryServiceProvide extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repositories\Game\GameInterface', 'App\Repositories\Game\GameRepository');
    }
}
