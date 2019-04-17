<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoVadisEvent extends Model
{
    protected $fillable = [
        'name', 
        'description', 
        'category',
        'date',
        'postal_number',
        'house_number',
        'street',
        'max_signed_up'
    ];
}
