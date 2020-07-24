<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CustomerMiddleware
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

        if( Auth::check() && Auth::user()->role_type == 'Customer'){
            if(Auth::user()->is_verified){
                return $next($request);
            }else{
//                dd('Working');
                return redirect()->route('not.verified');
            }
        }
        return redirect()->route('login');
    }
}
