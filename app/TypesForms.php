<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypesForms extends Model
{
    public function forms(){
        return $this->hasMany(Forms::class,null,'id');
    }
}
