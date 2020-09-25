<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\Store;
use App\Http\Middleware\Library;
use Illuminate\Support\Facades\DB;
use App\Http\Middleware\ProfileUpdate;
use Auth;
use Webpatser\Uuid\Uuid;
use App\User;
use GuzzleHttp\Client;


class EnduserController extends Controller
{
    //
    public function enduserHome()
    {

        return view('enduser.home');
    }
    public function enduserStore()
    {
        $store = new Store();
        $games=$store->getFilteredData();

       
        return view('enduser.store',['games'=>$games]);
    }
    public function enduserLibrary()
    {
    
        $store = new Store();
        $games=$store->getLibraryData(); 
        return view('enduser.library',['games'=>$games]);
    }

    public function enduserCommunity()
    {
        return view('enduser.community');
    }

    public function enduserConnect()
    {
        $users = DB::table('users')
                        ->where('username','!=',Auth::user()->username)
                        ->where('type','user')
                        ->get(); 
       /*  $request = DB::table('friends')
                    ->where('sender','||','receiver',Auth::user()->username)
                    -get(); */
        return view('enduser.connect',['users'=>$users]);
    }

    public function enduserMyProfile()
    {
        $profileinfo = DB::table('users')
                        ->where('username',Auth::user()->username)->get(); 
        
        $games = DB::table('transactions')
                    ->where('username',Auth::user()->username)
                    ->get();

       
        return view('enduser.myprofile',['profileinfo'=>$profileinfo[0],'games'=>count($games)]);
    }

    public function enduserPlans()
    {
        return view('enduser.plans');
    }

    public function enduserEditprofile()
    {
        $profileinfo = DB::table('users')
                        ->where('username',Auth::user()->username)
                        ->get(); 
        
        $games = DB::table('transactions')
                    ->where('username',Auth::user()->username)
                    ->get();
        return view('enduser.editprofile',['profileinfo'=>$profileinfo[0],'games'=>count($games)]);
    }
    public function enduserEditprofileSubmit(Request $request)
    {
      
       $request->validate([
        'email' => 'required|email:rfc,dns',
        'propic' => 'required|mimes:jpeg,jpg,bmp,png',
        'dateofbirth' => 'required|date',
        'bio' =>'required|max:80'
        ]);

        $val = Uuid::generate(4);
        $propic=$request->file('propic');
       
        if( $propic->move('propic', $val.'.'.$propic->getClientOriginalExtension()))
        {
            $user = new User();
            $user=$user::where('username',Auth::user()->username)->first();
            $user->email=$request->email;
            $user->propic='propic/'.$val.'.'.$propic->getClientOriginalExtension();
            $user->dob=$request->dateofbirth;
            $user->save();  
        }
        else
        {
            echo "<script>alert('Something was wrong!');</script>";
        } 
    
      $profileinfo = DB::table('users')
                        ->where('username',Auth::user()->username)
                        ->get(); 
        
        $games = DB::table('transactions')
                    ->where('username',Auth::user()->username)
                    ->get();
      return view('enduser.editprofile',['profileinfo'=>$profileinfo[0],'games'=>count($games)]);
    }

    public function enduserRate($id)
    {
        return view('enduser.rate');
    }

    public function enduserRatePost(Request $request,$id)
    {
       //return view('enduser.rate');
       $library = new Library();
       $library->rateGame($request,$id);
       
       return redirect()->route('endLibrary');
      
    }

    public function enduserGift($id)
    {
        return view('enduser.gift');
    }
    public function enduserGiftPost(Request $request,$id)
    {
        $user= DB::table('users')
                ->where('username',$request->username)
                ->where('username','!=',Auth::user()->username)
                ->get();
       

        if(count($user)>0)
        {
            // guzzel code here ;

            /*
                $client = new Client();
                $response = $client->request('POST', 'http://localhost:3000/home', [
                    'content-type' => 'application/json',
                    'form_params' => [
                        'sender' => $sender,
                        'receiver' => $receiver,
                        'convid' => "$convid",   
                    ]
                ]);
                $ctoken = json_decode($response->getBody(),true);

            */



            return "<script>alert('gifted');</script>";
        }
        else
        {
            return "<script>alert('invalid username');</script>";
        }
    }

    
}
