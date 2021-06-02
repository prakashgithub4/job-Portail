<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Jobseeker
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
        if((@Auth::user()->user_type==2)&&(\Auth::check())){
            return $next($request);
        }else{
            return redirect('jobseeker/login');
        }
    }
}
