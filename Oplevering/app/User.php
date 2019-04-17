<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\UserEvents;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'infix',
        'lastname',
        'postal_code',
        'house_number',
        'street',
        'city',
        'birthdate',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function company()
    {
        return $this->hasOne(Company::class)->withDefault();
    }

    public function getFavoriteCategoryAttribute()
    {
        return $this->categories->first();
    }

    public function categories()
    {
        return $this->belongsToMany(
            Category::class,
            'user_categories',
            'user_id',
            'category_id'
        );
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_users');
    }

    public function events()
    {
        return $this->belongsToMany(
            GoVadisEvent::class,
            'user_events',
            'user_id',
            'event_id'
        );
    }

    public function hasAccess(array $permissions) : bool
    {
        // check if the permission is available in any role
        foreach ($this->roles as $role) {
            if($role->hasAccess($permissions)) {
                return true;
            }
        }
        return false;
    }

    public function inRole(string $roleSlug)
    {
        return $this->roles()->where('slug', $roleSlug)->count() == 1;
    }

    public function hasPermission(Permission $permission){
        foreach ($this->roles as $role) {
            if($role->hasPermission($permission)) {
                return true;
            }
        }
        return false;
    }
}
