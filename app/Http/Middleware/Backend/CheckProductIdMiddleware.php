<?php

namespace App\Http\Middleware\Backend;

use Closure;

class CheckProductIdMiddleware
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
        if ($request->product_id === env('VERIFY_TOKEN')) {
            return $next($request);
        } else {
            dd('Product Id không đúng');
        }
    }
}
