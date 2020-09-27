<?php

namespace App\Exports;

use App\rechargerequest;
use Maatwebsite\Excel\Concerns\FromCollection;

class rechargerequests implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return rechargerequest::all();
    }
}