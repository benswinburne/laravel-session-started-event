<?php

namespace Swinburne\LaravelSessionStarted\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Swinburne\LaravelSessionStarted\Events\SessionStarted;
use Illuminate\Session\Middleware\StartSession as IlluminateStartSession;

class StartSession extends IlluminateStartSession
{
    /**
     * Start the session for the given request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Session\Session
     */
    protected function startSession(Request $request)
    {
        Event::fire(new SessionStarted(
            $session = parent::startSession($request)
        ));

        return $session;
    }
}
