<?php

namespace App\Http\Controllers\admin;
use Validator;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use auth;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\rechargerequests;
use App\Exports\gamelists;

use App\Http\Controllers\Controller;
use App\libraryentry;
use App\permission_rating;
use App\permission_gamedelete;
use App\permission_recharge;
use App\game;
use App\rechargerequest;
use App\user;
class adminController extends Controller
{
    public function index(Request $req){
        $username=$req->session()->get('username');
        $permission=permission_rating::where('username',$username)
        ->first();
        $permissionGameDelete=permission_gamedelete::where('username',$username)
        ->first();
        $permissionRecharge=permission_recharge::where('username',$username)
        ->first();

        
        
        $req->session()->put('permission',$permission->permissionstatus);
        $req->session()->put('permissiongamedelete',$permissionGameDelete->permissionstatus);
        $req->session()->put('permissionrecharge',$permissionRecharge->permissionstatus);

        return view("admin.adminhome");
    }

    public function ratings(Request $req){
        return view("admin.admingamerating");
    }

    public function showratings(Request $req){
      $emps= libraryentry::all();
      return response()->json(array('emp'=>$emps),200);//ok
    }

    public function searchshowratings(Request $req){
      $emps= libraryentry::where('username','like',$req->text.'%')//
      ->get();
      return response()->json(array('emp'=>$emps),200);
    }

    public function updateratingpost(Request $req){
      ///   
      
      $validation=Validator::make($req->all(),[
        'id'=>'required',
        'rating'=>'required'
        ]);
        if($validation->fails()){
        
            return back()
                    ->with('errors',$validation->errors())
                    ->withInput();
        
         }
  
  ////
        $update=libraryentry::where('id',$req->id)
        ->first();
        $update->ratting=$req->rating;
        $update->save();
        return redirect('/admin/ratings');
      }

    public function gamelist(Request $req){
        return view('admin.admingameslist');
    }
    public function gamelistpost(Request $req){
      return Excel::download(new gamelists,'gamelist.xlsx');
    }

    public function searchgame(Request $req){
      $emps= game::all();
      return response()->json(array('emp'=>$emps),200);
    }
    public function searchgamepost(Request $req){
        $emp=game::where('title','like',$req->text.'%')
        ->get();
        return response()->json(array('emp'=>$emp),200);
    }  
     
   
    public function gamedeletepost(Request $req){

      $validation=Validator::make($req->all(),[
        'id'=>'required' 
        ]);
        if($validation->fails()){
        
            return back()
                    ->with('errors',$validation->errors())
                    ->withInput();
        
         }
       
        $games=game::where('id',$req->id)
        ->delete();
        
        return redirect('/admin/gamelist');
    
    }

    public function userwalet(Request $req){
                
        return view("admin.adminrechargereq");       
      }
    public function userwaletPost(Request $req){

      $validation=Validator::make($req->all(),[
        'id'=>'required',
        'bonus'=>'required'     
        
        ]);
        if($validation->fails()){
        
            return back()
                    ->with('errors',$validation->errors())
                    ->withInput();
        
         }
                
        $walet=rechargerequest::where('id',$req->id)
        ->first();
        $preamount=(int)$walet->amount;
        $updateamount=(int)$req->bonus+$preamount;
        $walet->amount=$updateamount;
        $walet->save();

       return redirect('/admin/userwalet');   
      }

      public function showuserwalet(Request $req){
        $emps= rechargerequest::all();
        return response()->json(array('emp'=>$emps),200);
      }
      public function searchuserwalet(Request $req){
        $emp=rechargerequest::where('requester','like',$req->text.'%')
        ->get();
        return response()->json(array('emp'=>$emp),200);
       
      }

      public function userwaletexcel(Request $req){
        if($req->submit=="Excel"){

          return Excel::download(new rechargerequests,'userwalet.xlsx');
        }
      }

      public function users(Request $req){
        

       /*  $user = user::all();
        return view("admin.adminallusers")->with('user',$user); */

        $client = new Client();
            $response = $client->request('GET', 'http://localhost:3000/home/1', [
                'content-type' => 'application/json',
                'form_params' => [
                    'username' => Auth::user()->username,
                ]
            ]);
            $result = json_decode($response->getBody(),true);
              //var_dump($result[0]['username']); 
               // $result[$i]['colname']
                 //print_r($result);
                               
                 return view("admin.adminallusers")->with('result',$result); 

    }




}
