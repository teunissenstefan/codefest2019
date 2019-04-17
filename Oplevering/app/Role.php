<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name', 'slug', 'permissions',
    ];
    protected $casts = [
        'permissions' => 'array',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'role_users');
    }

    public function hasAccess(array $permissions) : bool
    {
        foreach ($permissions as $permission) {
            if ($this->hasPermission($permission))
                return true;
        }
        return false;
    }

    public function hasPermission(Permission $permission) : bool
    {
        if($this->permissions->contains($permission)){
            return true;
        }
        return false;
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'permission_roles');
    }

    public function givePermissionTo(Permission $permission)
    {
        return $this->permissions()->save($permission);
    }
}
