<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persons extends Model
{
    public function user()
    {
        return $this->hasMany(User::class, null, 'id');
    }
}
