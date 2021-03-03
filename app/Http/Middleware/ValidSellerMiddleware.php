<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class ValidSellerMiddleware
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
        $checkSeller= Session::get('SellerId');
        if($checkSeller){
            return $next($request);
        }else{
           return redirect('/login/seller')->with('warning','Opps! Please Login First');
        }
        
    }
}
 
    }