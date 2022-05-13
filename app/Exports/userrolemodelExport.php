<?php

namespace App\Exports;

use App\Models\userrolemodel;
use Maatwebsite\Excel\Concerns\FromCollection;

class userrolemodelExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return userrolemodel::all();
    }
}
