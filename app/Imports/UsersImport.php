<?php
namespace App\Imports;
use App\Models\WorldcitiesModel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new WorldcitiesModel([
            'city'       => $row[0],
            'lat'        => $row[1],
            'lng'        => $row[2],
            'country'    => $row[3],
            'iso3'       => $row[4],
            'population' => $row[5],
          
        ]);
    }
}