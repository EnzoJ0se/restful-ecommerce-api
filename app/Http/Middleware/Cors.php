<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $headers = [
            'Access-Control-Allow-Origin' => '*',
            // server side credencial support eg. cookies
            //'Access-Control-Allow-Credentials' => 'true'
        ];

        if (
            $request->isMethod('OPTIONS')
            && $request->hasHeader('Access-Control-Request-Method')
            && $request->hasHeader('Origin')
        ) {
            $headers['Access-Control-Allow-Headers'] = 'Content-Type, Authorization, cache-control, x-requested-with';
            $headers['Access-Control-Allow-Methods'] = 'GET, POST, PUT, PATCH, DELETE, OPTIONS';
        }

        $response = $next($request);
        $response->headers->add($headers);

        return $response;
    }
}
