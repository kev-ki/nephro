<?php

namespace App\Http\Middleware;

use Closure;

class Medecin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth() -> user()->type_user == 1) {
            return $next($request);
        }
        return redirect('auth.login')->with("errors", "Accès refusé");
    }
}
