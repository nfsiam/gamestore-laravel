<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }
    protected function authenticated(Request $request, $user)
    {
        if (auth()->user()->type == 'moderator') {
            return redirect()->route('forum.dashboard.index');
        }/* else{
            return redirect()->route('forum.index');
        }
        */
        else if(auth()->user()->type=='publisher')
        {
            return redirect()->route('pubReport');
        }
        else if (auth()->user()->type == 'admin') {
            $request->session()->put('username',auth()->user()->username);
            return redirect('/admin');
        }
        else if (auth()->user()->type == 'superadmin') {
            return redirect('/sadmin');
        }
        else if(auth()->user()->type == 'user')
        {
            return redirect()->route('endHome');
        }
        else{

            return redirect('/home');
        }
        
       
        return redirect('/');
       
    }
}
