<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'user_id',
        'email',
        'postal_code',
        'city',
        'house_number',
        'street',
    ];
}
