<?php

namespace App\Http\Middleware;

use Illuminate\Validation\Rule;
use Closure;

class Publish
{
    public $validations;
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
        global $validations;
        $validations = $request->validate([
            'title' => 'required|max:50|min:3',
            'price' => 'required|numeric|min:0',
            'releasedate' => 'required|date',
            'gamefile' => [
                'required',
                Rule::notIn(['jpg']),
            ],
            'gamepicture' => 'required|mimes:jpeg,jpg,bmp,png'
        ]); 

        if($validations->fails())
        {
            return view('publisher.myprofile');
        }
        else
        {
            return view('publisher.report');
            //echo '<script>console.log("Bye World");</script>';
        }
        
    }

   
}
