<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersRoles extends Model
{
    protected $fillable = [
        'user_id', 'roles_id', 'status', 'user_mod', 'reg_del',
    ];
}
