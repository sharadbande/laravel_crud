<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homemodel extends Model
{
    use HasFactory;

     protected $table = 'employee';

    protected $fillable = 
    [
        'name','address', 'mobile','designation','role'
    ];
}
