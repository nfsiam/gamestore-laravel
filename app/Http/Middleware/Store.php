<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\DB;
use Closure;
use Auth;
class Store
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

    public function getData()
    {
        $data = DB::table('games')
                    ->get();
        return $data;
        
    }
    public function getFilteredData()
    {
        // $datas = DB::table('libraryentries')
        //         ->where('username',Auth::user()->username)
        //         ->get();

        //select * from games where id!=(select gameid from libraryentries where username='koushiq')
        $data = DB::select("select * from games where id not in(select gameid from libraryentries where username='".Auth::user()->username."')");
        return $data;

    }
    public function getLibraryData()
    {
        $games = DB::table('libraryentries')
                ->join('games','libraryentries.gameid','games.id')
                ->where('username',Auth::user()->username)
                ->get();
        
        return $games;
    }
}
