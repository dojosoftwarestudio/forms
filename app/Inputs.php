<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inputs extends Model
{
    public function groups()
    {
        return $this->belongsToMany(Groups::class, 'groups_inputs', 'inputs_id', 'groups_id');
    }
}
