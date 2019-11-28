<?php

namespace App\Http\Middleware;

use Closure;

class Checkuser
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
        if($request->user()->email=='test@mail.com') {
            return $next($request);            
        }

        return redirect('/');
    }
}
