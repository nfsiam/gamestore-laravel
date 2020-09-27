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
use App\Libraryentries;
use App\Transactions;


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
           
            $client = new Client();
            $response = $client->request('GET', 'http://localhost:3000/home/'.$request->username, [
                'content-type' => 'application/json',
                'form_params' => [
                    'username' => Auth::user()->username,
                ]
            ]);
            $result = json_decode($response->getBody(),true);
            
            if($result[0]['permission']=="allowed")
            {
        
                $libraryentries  = new Libraryentries();
                $libraryentries = $libraryentries::where('username',Auth::user()->username)->where('gameid',$id)->first();
                $libraryentries->username = $request->username;
                $libraryentries->save();

                $transactions = new Transactions();
                $transactions = $transactions::where('username',Auth::user()->username)->where('gameid',$id)->first();
                $transactions->username = $request->username;
                $transactions->purchaseprice = 0 ;
                $transactions->transactiontype = 'gift';
                $transactions->save(); 

                echo "<script>alert('gifted');</script>";
                
            }
            else
            {
                echo "<script>alert('denied');</script>";
            }

        }
        else
        {
            echo "<script>alert('invalid username');</script>";
        }
        return redirect()->route('endLibrary');
    }

    public function enduserLogout()
    {
        Auth::logout();
        return redirect('/login');
    }

}
