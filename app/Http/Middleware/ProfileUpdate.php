<?php

namespace App\Http\Middleware;
use Closure;
use Webpatser\Uuid\Uuid;
use Auth;
use app\User;

class ProfileUpdate
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
        return $next($request);
    }
    public function validate($request)
    {
        

    }
}
