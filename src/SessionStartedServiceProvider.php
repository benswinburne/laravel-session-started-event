<?php

namespace Swinburne\LaravelSessionStarted;

use Illuminate\Support\ServiceProvider;
use Swinburne\LaravelSessionStarted\Http\Middleware\StartSession;

class SessionStartedServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
    }

    public function registerBindings()
    {
        $this->app->singleton(StartSession::class);
    }
}
