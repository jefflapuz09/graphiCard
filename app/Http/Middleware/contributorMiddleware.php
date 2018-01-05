<?php

namespace App\Http\Middleware;

use Closure;
use Redirect;
use Illuminate\Support\Facades\Auth;

class contributorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
      
            if($request->user()->role == 1) {
                //return redirect('/admin');
                return $next($request);
            }
            else
            {
                return $next($request);
            }
            
 

        if(Auth::guest())
        {
            return redirect('/Restricted');
        }
    }
}
