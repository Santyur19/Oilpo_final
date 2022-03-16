<?php

namespace App\Exports;

use App\Models\Compras;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;


class comprasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {


        return Compras::all();
    }
}
