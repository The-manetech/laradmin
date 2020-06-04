<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class Authenticate
{
    public function handle( $request, Closure $next, $app = null)
    {
        $app = laradmin()->getApp($app);

        if (!$app->isLogged()) {

            return $app->redirectOut();

        }

        return $next($request);

    }
}