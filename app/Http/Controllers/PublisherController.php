<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Middleware\Publish;
use App\Http\Middleware\Store;
use App\Http\Middleware\Library;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Auth;

class PublisherController extends Controller
{
    //
    public function publisherReport()
    {
        $datas = DB::table('transactions')
                ->join('games','games.id','transactions.gameid')
                ->join('libraryentries','transactions.gameid','libraryentries.gameid')
                ->where('publisher',Auth::user()->username)
                ->get();
        
        return view('publisher.report',['datas'=>$datas]);
    }

    public function publisherStore()
    {
       
        $store = new Store();
        $data = $store->getData();
        return view('publisher.store',['data'=>$data]);
    }

    public function publisherLibrary()
    {
       $library = new Library();
       $games = $library->getDataByUser();
        return view('publisher.library',['games'=>$games]);

    }

    public function publisherCommunity()
    {
        return view('publisher.community');
    }

    public function publisherMyprofile()
    {
        return view('publisher.editprofile');
    }

    public function publisherPublish()
    {
        return view('publisher.publish');
    }

    public function publisherUpload(Request $request)
    {
        $publish = new Publish();
        $publish->validate($request);
        return view('publisher.publish');
    }
    public function publisherLogout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
