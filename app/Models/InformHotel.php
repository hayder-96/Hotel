<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformHotel extends Model
{
    use HasFactory;


    
   
    protected $fillable = [
        'namehotel',
        'evaluation',
        'image1',
        'image2',
        'image3',
        'manger',
        'number',
        'country',
        'city',
        'latitude',
        'longtude',
        'admin_id',
        'email',
        'ev'
    ];
}
