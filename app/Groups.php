<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    public function forms()
    {
        return $this->belongsToMany(Forms::class, 'forms_groups', 'groups_id', 'forms_id');
    }
    public function inputs()
    {
        return $this->belongsToMany(Inputs::class, 'groups_inputs', 'inputs_id', 'groups_id');
    }
}
