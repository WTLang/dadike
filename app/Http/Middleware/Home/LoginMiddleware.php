<?php

namespace App\Http\Middleware\Home;

use Closure;

class LoginMiddleware
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
        if ($request->session()->has('us_name')) {
            return $next($request);
        }else{
            return redirect()->route('login');
        }
    }
}
