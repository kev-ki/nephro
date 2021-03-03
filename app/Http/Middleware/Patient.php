<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Patient
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth() -> user()->type_user == 1 || auth()->user()->type_user == 2 || auth()->user()->type_user == 3) {
            return $next($request);
        }
        return redirect('auth.login')->with("errors", "Accès refusé");
    }
}
