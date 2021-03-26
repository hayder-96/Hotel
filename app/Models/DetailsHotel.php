<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailsHotel extends Model
{
    use HasFactory;


    protected $fillable = [
    'typeroom',
        'nameroom',
        'priceroom',
            'typebed',
            'numbed',
            'numguest',
            'Facilities',
            'meansofcomfort',
            'kids',
            'animals',
            'access',
            'breckfast',
            'imageroom1',
            'imageroom2',
            'imageroom3',
            'numroom',
            'details_id'
    ];
}
