<?php

namespace App\Http\Controllers\super;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\permission_rating;
use App\permission_gamedelete;
use App\permission_recharge;


class superadminController extends Controller
{
    public function index(Request $req){
        return view('superadmin.sadminhome');
    }
    public function permissionrating(Request $req){

        $permission = permission_rating::all();
        return view('superadmin.sadminperrating')->with('permission',$permission);
    }

    public function permissionratingPost(Request $req){

        $permission = permission_rating::where('username',$req->username)
        ->first();
         $username=$req->username;
         $permissionstatus=$req->permissionstatus;
         if($req->submit=="update"){
             if($username!=""){
                // $permission->username=$username;
                 $permission->permissionstatus=$permissionstatus;
                 $permission->save();
                // return response($permission,200);
                }
        // return view('superadmin.sadminperrating')->with('permission',$permission);
         return redirect('/sadmin/permissionrating');
            }
    }

    public function permissiongamedelete(Request $req){

        $permission = permission_gamedelete::all();
        return view('superadmin.sadminpergamedelete')->with('permission',$permission);
    }

    public function permissiongamedeletePost(Request $req){

        $permission_game_delete = permission_gamedelete::where('username',$req->username)
        ->first();
         $username=$req->username;
         $permissionstatus=$req->permissionstatus;
         if($req->submit=="update"){
             if($username!=""){
                // $permission->username=$username;
                 $permission_game_delete->permissionstatus=$permissionstatus;
                 $permission_game_delete->save();
              //   return response($permission_game_delete,200);
                }
        // return view('superadmin.sadminperrating')->with('permission',$permission);
         return redirect('/sadmin/permissiongamedelete');
            }
    }


    public function permissionrecharge(Request $req){

        $permission = permission_recharge::all();
        return view('superadmin.sadminperrecharge')->with('permission',$permission);
    }

    public function permissionrechargePost(Request $req){

        $permission_recharge = permission_recharge::where('username',$req->username)
        ->first();
         $username=$req->username;
         $permissionstatus=$req->permissionstatus;
         if($req->submit=="update"){
             if($username!=""){
                // $permission->username=$username;
                 $permission_recharge->permissionstatus=$permissionstatus;
                 $permission_recharge->save();
                // return response($permission,200);
                }
        // return view('superadmin.sadminperrating')->with('permission',$permission);
         return redirect('/sadmin/permissionrecharge');
            }
    }
}
