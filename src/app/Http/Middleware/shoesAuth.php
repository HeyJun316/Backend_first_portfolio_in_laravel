<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class shoesAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(false == session("shoes_auth")){
            redirect('/out');
        }
        return $next($request);
    }
}
