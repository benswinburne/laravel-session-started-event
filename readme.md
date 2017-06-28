# Laravel Session Started Event

This package fires an event which can be used in service providers (or indeed
anywhere an an application) to execute code when a session is started.

## Installation

Add the service provider to the `providers` array in `config/app.php`.

    'providers' => [
        ...
        Swinburne\LaravelSessionStarted\SessionStartedServiceProvider::class,
        ...
    ],

Replace the existing Laravel StartSession middleware with that from this
package in `app/Http/Kernel.php`. It's in the `web` group by default.

Replace

    \Illuminate\Session\Middleware\StartSession::class

With

    \Swinburne\LaravelSessionStarted\Http\Middleware\StartSession::class

For example

    protected $middlewareGroups = [
        'web' => [
            ...
            \Swinburne\LaravelSessionStarted\Http\Middleware\StartSession::class,
            ...
        ]
        ...

## Usage

Once installed you may listen for the following event which is fired upon
session start.

    \Swinburne\LaravelSessionStarted\Events\SessionStarted

For example, in the `boot()` method of a service provider you may listen to the
event in the following way.

    <?php

    namespace App\Providers;

    use Illuminate\Support\Facades\Event;
    use Illuminate\Support\ServiceProvider;
    use Swinburne\LaravelSessionStarted\Events\SessionStarted;

    class AppServiceProvider extends ServiceProvider
    {
        /**
        * Boot the application services.
        *
        * @return void
        */
        public function boot()
        {
            Event::listen(SessionStarted::class, function ($event) {
                echo "My session was started";
            });
        }
    }
