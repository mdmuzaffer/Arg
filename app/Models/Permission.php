<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_permissions', 'permission_id', 'role_id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'users_permissions', 'permission_id', 'role_id');
    }

    public function usersPermissions()
    {
        return $this->belongsToMany(Role::class, 'users_permissions', 'permission_id', 'role_id');
    }

}
