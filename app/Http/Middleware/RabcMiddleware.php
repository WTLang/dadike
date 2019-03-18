<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class RabcMiddleware
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
        dump(session('admin_node_type'));
        return $next($request);
    }
}
