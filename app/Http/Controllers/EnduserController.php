<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EnduserController extends Controller
{
    //
    public function enduserHome()
    {
        return view('enduser.home');
    }
    public function enduserStore()
    {
        return view('enduser.store');
    }
    public function enduserLibrary()
    {
        return view('enduser.library');
    }

    public function enduserCommunity()
    {
        return view('enduser.community');
    }

    public function enduserConnect()
    {
        return view('enduser.connect');
    }

    public function enduserMyProfile()
    {
        return view('enduser.myprofile');
    }

    public function enduserPlans()
    {
        return view('enduser.plans');
    }
}
