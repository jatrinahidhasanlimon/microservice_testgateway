<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class AuthenticateAccess
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // dd($request->header('Authorization'));
        // return $next($request);
        // dd($request);
        $allowedSecrets = explode(',', env('ALLOWED_SECRETS'));
            // dd(in_array($request->header('Authorization'), $allowedSecrets));
        if (in_array($request->header('Authorization'), $allowedSecrets)) {
            // dd('here');
            return $next($request);
        }

        abort(Response::HTTP_UNAUTHORIZED);
    }
}
