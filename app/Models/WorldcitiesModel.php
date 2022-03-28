<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorldcitiesModel extends Model
{
    use HasFactory;



    
    protected $table = 'worldcities';

    protected $fillable = 
    [
        'city','lat', 'lng','country','iso3','population'
    ];
}
