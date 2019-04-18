<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\UserEvents;

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

    public function getUserAttribute()
    {
        return $this->users()->first();
    }

    public function users()
    {
        return $this->belongsToMany(
            User::class,
            'user_events',
            'event_id',
            'user_id'
        );
    }

    public function getCategoryAttribute()
    {
        return $this->categories()->first();
    }

    public function categories()
    {
        return $this->belongsToMany(
            Category::class,
            'event_categories',
            'event_id',
            'category_id'
        );
    }
    public function participating_users()
    {
        return $this->belongsToMany(
            User::class,
            'event_users',
            'event_id',
            'user_id'
        );
    }
}
