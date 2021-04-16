<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notifay extends Model
{
    use HasFactory;


    protected $fillable = [
    'admin_id',
    'content',
    'noty',
    'name'

    ];
}
