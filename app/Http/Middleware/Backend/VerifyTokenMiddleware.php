<?php

namespace App\Http\Middleware\Backend;

use Closure;
use Illuminate\Http\Request;

class VerifyTokenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->token !== env('VERIFY_TOKEN')) {

            return redirect('/');
        }

        return $next($request);
    }
}
