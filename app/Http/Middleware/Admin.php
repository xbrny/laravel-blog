<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
        if(!auth()->user()->admin)
        {
            session()->flash('error', 'You must have admin permission in order to perform that action');

            return back();
        }
        
        return $next($request);
    }
}
