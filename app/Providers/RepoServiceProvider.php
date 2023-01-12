<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repository\MainRepoInterface',
            'App\Repository\User\UserRepo');

        $this->app->bind('App\Repository\MainRepoInterface',
            'App\Repository\Post\PostRepo');

            $this->app->bind('App\Repository\MainRepoInterface',
            'App\Repository\Comment\CommentRepo');

            $this->app->bind('App\Repository\MainRepoInterface',
            'App\Repository\Replay\ReplayRepo');
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
