<?php

namespace App\Http\Middleware\Admin;

use Closure;

class AloginMiddleware
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
        if ($request->session()->has('admin_name')) {
            return $next($request);
        }else{
            return redirect()->route('Alogin');
        }
    }
}
