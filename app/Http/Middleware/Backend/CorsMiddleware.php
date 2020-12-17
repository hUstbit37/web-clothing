<?php

namespace App\Http\Middleware\Backend;

use Closure;
use Illuminate\Http\Request;

class CorsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
//        header("Access-Control-Allow-Origin: http://localhost:8080");
        //ALLOW OPTIONS METHOD
//        $headers = [
//            "Access-Control-Allow-Origin" => "http://localhost:8080",
//            'Access-Control-Allow-Methods' => 'POST,GET,OPTIONS,PUT,DELETE',
//            'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, Authorization',
//        ];
//        if ($request->getMethod() == "OPTIONS"){
//            //The client-side application can set only headers allowed in Access-Control-Allow-Headers
//            return response()->json('OK',200,$headers);
//        }
//        $response = $next($request);
//        foreach ($headers as $key => $value) {
//            $response->header($key, $value);
//        }
//        return $response;
        return $next($request)
            ->header('Access-Control-Allow-Origin', 'http://localhost:8080')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, PATCH, DELETE, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'Authorization,Accept,Origin,DNT,X-CustomHeader,Keep-Alive,User-Agent,X-Requested-With,If-Modified-Since,Cache-Control,Content-Type,Content-Range,Range');
    }
}
