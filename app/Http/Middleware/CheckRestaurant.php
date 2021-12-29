<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRestaurant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()){
            if(Auth::user()->role != "restaurant"){
                return redirect()->intended('unauthenticated');
            }
            if(Auth::user()->restaurant_id == ""){
                return redirect()->intended('unauthenticated');
            }
        }else{
            return redirect()->intended('login');
        }
        return $next($request);
    }
}
