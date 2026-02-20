<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeaders
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if (method_exists($response, 'header')) {
            return $response->header(
                'Content-Security-Policy',
                "default-src 'self'; script-src 'self' 'unsafe-inline' 'unsafe-eval' https: http:; style-src 'self' 'unsafe-inline' https: http:; img-src 'self' data: https: http:; font-src 'self' data: https: http:; connect-src 'self' https: http: ws: wss:; frame-src 'self' https: http:;"
            )
                ->header('X-Frame-Options', 'SAMEORIGIN')
                ->header('X-Content-Type-Options', 'nosniff')
                ->header('Referrer-Policy', 'strict-origin-when-cross-origin')
                ->header('Permissions-Policy', 'geolocation=(), camera=()');
        }

        // fallback za BinaryFileResponse
        $response->headers->set(
            'Content-Security-Policy',
            "default-src 'self'; script-src 'self' 'unsafe-inline' 'unsafe-eval' https: http:; style-src 'self' 'unsafe-inline' https: http:; img-src 'self' data: https: http:; font-src 'self' data: https: http:; connect-src 'self' https: http: ws: wss:; frame-src 'self' https: http:;"
        );
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
        $response->headers->set('Permissions-Policy', 'geolocation=(), camera=()');

        return $response;
    }
}
