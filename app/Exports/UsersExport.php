<?php

namespace App\Exports;

use App\Models\WorldcitiesModel;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return WorldcitiesModel::all();
    }
}
