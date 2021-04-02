<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notify extends Model
{
    use HasFactory;


   

    protected $fillable = [

        'content',
        'admin_id',
        'user_id',
        'namehotel',
        'noty'

    ];
}
