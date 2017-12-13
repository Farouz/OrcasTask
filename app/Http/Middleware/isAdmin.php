<?php

namespace App\Http\Middleware;

use Closure;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    //Middleware to check the user is admin or regular user
    public function handle($request, Closure $next)
    {
        if(auth()->check() && auth()->user()->is_admin){
            return $next($request);
        }else{
            return back();
        }

    }
}
