<?php

namespace App\Http\Middleware;

use Closure;

class permissionrating
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
        if($request->session()->get('permission') == 'yes'){
            
            return $next($request);
        }
        else{
            return redirect('/admin');
        }
    }
}
