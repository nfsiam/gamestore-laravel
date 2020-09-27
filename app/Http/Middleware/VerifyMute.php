<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Muteduser;

class VerifyMute
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
        $username = Auth::user()->username;
        
        if(Muteduser::where('username',$username)->exists())
        {
            return response()->json(array(
                'error' => 'sorry you are muted'
            ));
        }
        else
        {
            return $next($request);
        }
    }
}
