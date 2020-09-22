<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Middleware\Publish;
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
        return view('publisher.store');
    }

    public function publisherLibrary()
    {
        return view('publisher.library');
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
          
       
        //Publish::validate($request);
       
        $publish = new Publish();
        $publish->validate($request);

        //return redirect('pubPublish');
        //return redirect()->route('pubPublish');

    }
}
