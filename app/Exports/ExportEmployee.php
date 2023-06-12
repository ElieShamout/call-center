<?php

namespace App\Exports;

use App\Models\Client;
use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportEmployee implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Client::select('first_name','middle_name','last_name','email','phone','city','street','id_number')->get();
    }
}
