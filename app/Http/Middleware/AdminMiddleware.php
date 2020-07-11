<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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

        if(Auth::check()){
            if(Auth::user()->role_type == 'Admin'){
                return $next($request);
            }
            if (Auth::user()->role_type == 'Customer'){

                if(Auth::user()->is_verified){
                    return redirect('not-authorized');
                }
//                dd('Working');
               return redirect('not-verified');
            }else{
                dd("Some One Try To login Out of admin and customer");
            }
        }else{
            return redirect('/login');
        }
    }
}
