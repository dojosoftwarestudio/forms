<?php
namespace App\Repositories\Eloquent;

use App\Repositories\ITypesInputsRepository;
use App\TypesInputs;

class TypesInputsRepository implements ITypesInputsRepository
{
    public function all()
    {
        return TypesInputs::orderBy('id','desc')->get();
    }
}
