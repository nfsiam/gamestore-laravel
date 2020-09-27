<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class ModAccess
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
        if(Auth::user()->type == "moderator")
        {
            return $next($request);
        }
        else
        {
            return redirect()->route('forum.index');
        }
    }
}
