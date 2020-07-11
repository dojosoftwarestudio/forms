<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{

    public function roles()
    {
        return $this->belongsToMany(Users::class, 'users_roles', 'users_id', 'roles_id');
    }
}
