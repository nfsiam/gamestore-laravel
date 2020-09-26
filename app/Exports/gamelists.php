<?php

namespace App\Exports;

use App\game;
use Maatwebsite\Excel\Concerns\FromCollection;

class gamelists implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return game::all();
    }
}