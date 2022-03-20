<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'venue',
        'address_one',
        'address_two',
        'city',
        'region',
        'post_code',
        'country',  
        'type',  
        'organization',  
        'email',  
        'phone',  
    ];
}
