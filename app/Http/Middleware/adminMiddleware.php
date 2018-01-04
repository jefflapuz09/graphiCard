<?php

namespace App\Http\Middleware;

use Closure;
use Redirect;
use Illuminate\Support\Facades\Auth;
class adminMiddleware
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
        if(Auth::check())
        {
            if($request->user()->role == 1) {
                return $next($request);
            }
            return redirect('/admin');
        }
        else
        {
            return redirect('/Restricted');
        }

        if(Auth::guest())
        {
            return redirect('/Restricted');
        }

        
    }
}
