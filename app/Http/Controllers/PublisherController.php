<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Middleware\Publish;
use App\Http\Middleware\Store;
use App\Http\Middleware\Library;
use Illuminate\Validation\Rule;

class PublisherController extends Controller
{
    //
    public function publisherReport()
    {
       
        return view('publisher.report');
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
        //return redirect()->route('pubPublish');
    }
}
