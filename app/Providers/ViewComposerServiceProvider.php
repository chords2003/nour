<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        view()->composer('layouts.app', function ($view) {
            $view->with('user', Auth::user());
        });

        view()->composer('*', function ($view) {
            $view->with('users', \App\Models\User::all());
        });
    }
}
