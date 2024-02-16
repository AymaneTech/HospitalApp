<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class is_doctor_or_admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        /*if (!auth()->guard('doctor')->user() && !auth()->guard('admin')->user()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }*/
//        if(! auth("admin")->user() || ! auth("doctor")->user()){
//            dd(auth("doctor")->user());
//        }
        return $next($request);
    }
}
