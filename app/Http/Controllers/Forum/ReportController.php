<?php

namespace App\Http\Controllers\Forum;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;
use PDF;
use DB;
use Auth;
use Validator;

use App\Forumpost;
use App\Forumcomment;
use App\User;
use App\Postreport;
use App\Postreact;
use App\Postdelreq;
class ReportController extends Controller
{
    public function getData()
    {
        $data = [];

        $data['pendingcount'] = Forumpost::where('status','pending')
                                    ->where('dtime',null)
                                    ->count();
        $data['postreportcount'] = Postreport::where('status','pending')
                                    ->count();

        $data['postdelreqcount'] = Postdelreq::where('status','pending')
                                    ->count();

        $data['usercount'] = User::where('type','user')
                            ->orWhere('type','publisher')
                            ->count();

        $data['issuecount'] = Forumpost::where('posttype','issue')
                            ->count();
        $data['reviewcount'] = Forumpost::where('posttype','review')
                            ->count();
        $data['walkthroughcount'] = Forumpost::where('posttype','walkthrough')
                            ->count();
        $data['commentcount'] = Forumcomment::all()
                            ->count();

        $data['reactcount'] = Postreact::all()
                            ->count();

        return $data;
    }
    public function index()
    {
        $data = $this->getData();

        $pdf = PDF::loadView('forum.report',$data);

        return $pdf->download('report.pdf');
    }

    public function csv()
    {
        $data = $this->getData();

        $filename = "report.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, array('name', 'counts'));

        fputcsv($handle, array('Pending Post Count', $data['pendingcount']));
        fputcsv($handle, array('Post Report Count', $data['postreportcount']));
        fputcsv($handle, array('Post Delete Request Count', $data['postdelreqcount']));
        fputcsv($handle, array('Total User Count', $data['usercount']));
        fputcsv($handle, array('Total Comment Count', $data['commentcount']));
        fputcsv($handle, array('Total React Count', $data['reactcount']));
        fputcsv($handle, array('Total Issue Count', $data['issuecount']));
        fputcsv($handle, array('Total Review Count', $data['reviewcount']));
        fputcsv($handle, array('Total Walkthrough Count', $data['walkthroughcount']));
        
        fclose($handle);

        $headers = array(
            'Content-Type' => 'text/csv',
        );

        return Response::download($filename, 'report.csv', $headers);
    }
}
