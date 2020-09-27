<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Middleware;
use App\Cartitems;
use App\Libraryentries;
use App\Games;
use App\Transactions;
use App\Friend;

class AjaxController extends Controller
{
    //

    public function htmldata($games)
    {
        $output="";
        foreach($games as $game)
         {
           
            $output.='<div class="box-wrapper">
                  <div class="game-wrapper d-flex">

                      <div class="box mb-3">
                          <img src="'.asset($game->propic).'" alt="" srcset=""> 
                      </div>

                      <div class="box-text mr-3 mb-3 text-center">
                        <h5>'.$game->title.'</h5>
                      
                        <h6>Current Price : $'.$game->price.'</h6>
                      <h6>Publisher: '.$game->publisher.'</h6>
                      <h6>Release Date : '.$game->publishdate.'</h6>
                      </div>
                  </div>
                </div>';
         }
         return $output;
    }
    
    public function search(Request $request,$id)
    {
        $games= DB::table('games')->where('title','LIKE','%'.$id."%")->get();
        $data=$this->htmldata($games);
        return Response($data);
    }

    public function searchLib($id)
    {
        $games= DB::table('games')->where('title','LIKE','%'.$id."%")->where('publisher',Auth::user()->username)->get();
        $data=$this->htmldata($games);
        return Response($data);
    }

    public function getAll()
    {
        $games= DB::table('games')->get();
        $data=$this->htmldata($games);
        return Response($data);
    }
    public function addToCart($id)
    {
        $res = DB::table('cartitems')->where('gameid',$id)->where('purchaserusername',Auth::user()->username)->get();
        
        if(count($res)==0)
        {
            $game= DB::table('games')->where('id',$id)->get();
            $cartitems = new Cartitems();
            $cartitems->gameid=$game[0]->id;
            $cartitems->purchaserusername=Auth::user()->username;
            $cartitems->addedat=date("Y-m-d h:m:s");
            $cartitems->save();
            return "<script>alert('successfully added');</script>";
        }
        else
        {
            return "<script>alert('already exists!');</script>";
        }
      
    }

    public function showCartitems()
    {
        $output='<table class="table table-striped"><tr><th>Title</th><th>Price</th><th>Added To Cart At</th></tr>';
        $cartitems= DB::table('cartitems')
                    ->join('games','cartitems.gameid','games.id')
                    ->where('cartitems.purchaserusername',Auth::user()->username)
                    ->get();
       /*  $cartitems = DB::table('cartitems')->where('purchaserusername',Auth::user()->username);
       
         */
        $total=0;
        foreach($cartitems as $cartitem)
        {
            $output.=
            '<tr>
               
                <td>'.$cartitem->title.'</td>
                <td>'.$cartitem->price.' </td>
                <td>'.$cartitem->addedat.'</td>
            </tr>
            
            ';
            $total+=$cartitem->price;
        }
        
        if(count($cartitems)>0)
        {
            $output.=
            '<tr>
                <td></td>
                <td> Total = '.$total.'</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td><button id="checkoutbtn" class="btn btn-sm btn-primary">Checkout</button></td>
                <td><button id="removeallbtn"  class=" btn btn-sm btn-danger">RemoveAll</button></td>
                </tr>
             ';
        }
        $output.='</table>';
        return $output;
        
    }

    public function removeAll()
    {
        $cartitems= new Cartitems();
        $cartitems::where('purchaserusername',Auth::user()->username)->delete();

    }

    public function addTransaction()
    {
        $games = DB::table('cartitems')
                    ->join('games','cartitems.gameid','games.id')
                    ->where('cartitems.purchaserusername',Auth::user()->username)
                    ->get();
        
        
        foreach($games as $game)
        {
            $transaction = new Transactions();
            $libraryentries = new Libraryentries();
            $transaction->gameid=$game->id;
            $transaction->username=Auth::user()->username;
            $transaction->purchaseprice=$game->price;
            $transaction->transactiontype="regular";
            $transaction->transactionat=date("Y-m-d h:m:s");
            $transaction->save();

            $libraryentries->gameid=$game->id;
            $libraryentries->ratting=0.00;
            $libraryentries->username=Auth::user()->username;
            $libraryentries->addedat=date("Y-m-d h:m:s");
            $libraryentries->save();
        }
    }

    public function updateCart($id)
    {
        if($id==1)
        {
            $this->removeAll();
            return '<script>alert("Removed all items from cart");</script>';
        }
        else
        {
            $this->addTransaction();
            $this->removeAll();
            return '<script>alert("Purchased");</script>';
        }
    }

    public function addFriend($id)
    {
        $friend = new Friend();
        $friend->sender = Auth::user()->username;
        $friend->receiver=$id;
        $friend->status='requested';
        $friend->actionat=date("Y-m-d h:m:s");
        
        if($friend->save())
        {
            return "<script>alert('Friend request sent'); window.location.href='/enduser/connect';</script>";
        }
        else
        {
            return "<script>alert('Friend request not sent');window.location.href='/enduser/connect';</script>";
        }
    }

    public function removeFriend($id)
    {
       /*  $cartitems= new Cartitems();
        $cartitems::where('purchaserusername',Auth::user()->username)->delete(); */
        $friend = new Friend();
        $friend::where('id',$id)->delete();
        return "<script>window.location.href='/enduser/connect';</script>"; 
    }

    public function acceptFriend($id)
    {
        $friend = new Friend();
        $friend = $friend::find($id);
        $friend->status='accepted';
        $friend->save();
        return "<script>window.location.href='/enduser/connect';</script>"; 

    }

    
}
