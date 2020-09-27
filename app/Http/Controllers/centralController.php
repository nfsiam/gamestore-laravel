<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class centralController extends Controller
{
     function index(){
        return view('index');
    }

    function verify(Request $request){
        
        
        $data = DB::table('users')
                    ->where('username', $request->username)
                    ->where('password', $request->password)
                    ->get();

        if(count($data) > 0 ){
            $request->session()->put('username', $request->username);
            $request->session()->put('type', $data[0]->type);
            
            if($data[0]->type == "admin"){
                return redirect()->route('gamelist');
            }

            
        }else{
            $request->session()->flash('msg', 'invalid username or password');
            return view('index');
        }
    }
    
    public function gamelist(Request $request)
    {
        $g_list = DB::table('games')->get();
        
        return view('gamelist',['g_list'=>$g_list]);
    }
    public function userlist(Request $request)
    {
        $u_list = DB::table('users')->get();
        
        return view('userlist',['u_list'=>$u_list]);
    }
    public function transactions(Request $request)
    {
        $list = DB::table('transactions')->get();
        
        return view('transactions',['list'=>$list]);
    }

    public function profile(Request $req){

        // $user = $req->session()->get('username');
        $user = 'EA';
        $list = User::where('username',$user)->get();
        $list = $list[0];
        return view('profile',['userInfo'=>$list]);

    }
    public function profileUpdate(Request $req){

        $req->validate([
            'name'=>'required',
            'dob'=>'required',
            'bio'=>'required'
        ]);
        
        $id = $req->but;
        $user = user::where('id',$id)->get();
        $user = $user[0];

        $user->name     = $req->name;
        $user->dob      = $req->dob;
        $user->bio      = $req->bio;
        
        $user->save();
        return redirect('/profile');

    }

    public function addtocart(Request $req){

        $existID = DB::table('cartitems')->where('gameid',$req->id)->get();

        if(count($existID)>0)
        {
            return -1;
        }
        
        $game =  DB::table('games')->where('id',$req->id)->get();
        
        DB::table('cartitems')->insert([
            'gameid'            => $game[0]->id,
            'purchaserusername' => 'EA'
        ]);
        
        return 0;
    }

    public function makefriend(Request $req){
        
        DB::table('friends')->insert([
            'id'        => '1',
            'sender'    => 'EA',
            'receiver'  => 'EA',
            'status'    => 'good'
        ]);
        
        return 0;
    }

}
