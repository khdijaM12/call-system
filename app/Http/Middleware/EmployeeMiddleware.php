<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EmployeeMiddleware
{
    public function handle(Request $request, Closure $next)
    {
       
        if (auth()->check() && auth()->user()->isEmployee()) {
            return $next($request);
        }

        return abort(403); 
    }
}
