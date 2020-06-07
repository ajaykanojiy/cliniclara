<?php

namespace App\Http\Middleware;

use Closure;

class custumauth
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

        if(!session()->has('sess')){

          return redirect('log_form')->with('success','Invalid Email and/or password.');
        }
        return $next($request);
        // return redirect('dash');
    }
}
