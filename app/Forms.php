<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forms extends Model
{
    protected $fillable = [
        'id', 'name', 'code', 'types_forms_id', 'status', 'reg_del','user_mod'
    ];
    public function type(){
        return $this->belongsTo(TypesForms::class,'types_forms_id','id');
    }
    public function format()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'code' => $this->code,
            'types_forms_id' => $this->types_forms_id,
            'user_mod' => $this->user_mod,
            'code' => $this->code,
            'created_at' => $this->created_at->diffForHumans(),
            'updated_at' => $this->updated_at->diffForHumans(),
        ];
    }
    public function groups()
    {
        return $this->belongsToMany(Groups::class, 'forms_groups', 'forms_id', 'groups_id');
    }
}
