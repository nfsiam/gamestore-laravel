<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Libraryentries;
use Illuminate\Support\Facades\DB;

class Library
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

    public function getDataByUser()
    {
        $data = DB::table('Games')->where('publisher',Auth::user()->username)
                    ->get();
        return $data;
        
    }

    public function rateGame($request,$id)
    {
        $request->validate([
            'ratting' => 'required|numeric|min:1|max:5',
        ]);
        
        $data = DB::table('libraryentries')
            ->where('gameid',$id)
            ->where('username',Auth::user()->username)
            ->get();
       
        $libraryentries = new Libraryentries();

        $libraryentries=$libraryentries::find($data[0]->id);
        $libraryentries->ratting=$request->ratting;
        $libraryentries->save();
        


    }
}
