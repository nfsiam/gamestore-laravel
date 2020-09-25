<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\Store;
use Illuminate\Support\Facades\DB;
use Auth;

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
    public function enduserEditprofileSubmit()
    {
        
    }

    
}
