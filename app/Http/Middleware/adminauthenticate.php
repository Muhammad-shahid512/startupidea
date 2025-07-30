<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class adminauthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
           if(!Auth::guard('admin')->check()){
return redirect()->route('auth.loginpage')
    ->with('danger', 'Access denied: you are not authorized to view this page.');
        }
        return $next($request);
    }
}
