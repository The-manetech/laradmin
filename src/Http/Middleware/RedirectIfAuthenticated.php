<?php

namespace Laradmin\Http\Middleware;

use Closure;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $app = null)
    {
        $app = laradmin()->getApp($app);

        if ($app->isLogged()) {

            return $app->redirectToHome();

        }

        return $next($request);
    }
}
