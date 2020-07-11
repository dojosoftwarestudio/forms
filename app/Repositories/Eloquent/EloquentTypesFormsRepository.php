<?php

namespace App\Repositories\Eloquent;

use App\Repositories\TypesFormsRepository;
use App\TypesForms;

class EloquentTypesFormsRepository implements TypesFormsRepository
{
    public function list()
    {
        return TypesForms::orderBy('id', 'desc')->get();
    }
    public function select()
    {
        return TypesForms::orderBy('id', 'desc')->pluck('name', 'id');
        //Category::orderBy('name', 'desc')->pluck('name', 'id');
    }
}
