<?php

namespace App\Http\Middleware;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Games;
use Auth;
use Closure;
use Webpatser\Uuid\Uuid;
class Publish
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
        $date =  date("Y-m-d");
        $validations=$request->validate([
            'title' => 'required|max:50|min:3',
            'price' => 'required|numeric|min:0',
            'gamefile' => [
                'required',
                Rule::notIn(['jpg']),
            ],
            'gamepicture' => 'required|mimes:jpeg,jpg,bmp,png'
        ]);
            $val = Uuid::generate(4);
            
            $gamefile=$request->file('gamefile');
            $gamepic=$request->file('gamepicture');
            if($gamefile->move('upload', $val.'.'.$gamefile->getClientOriginalExtension()) && $gamepic->move('upload', $val.'.'.$gamepic->getClientOriginalExtension())  ){
                echo "<script>alert('Game Uploaded Successfully!');</script>";
            }else{
                echo "<h1>Error While Uploading Try again!</h1>";
            }
            

            $games = new Games();
            $games->title  = $request->title;
            $games->propic  = 'upload/'. $val.'.'.$gamepic->getClientOriginalExtension();
            $games->filepath    = 'upload/'.$val.'.'.$gamefile->getClientOriginalExtension();
            $games->publisher= Auth::user()->username;
            $games->publishdate = $date;
            $games->offerid = NULL;
            $games->parentgameid=NULL;
            $games->price     = $request->price;
            $games->save();

        
    }

   
}
