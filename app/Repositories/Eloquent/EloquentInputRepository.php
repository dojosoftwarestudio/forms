<?php

namespace App\Repositories\Eloquent;

use App\Repositories\InputRepository;
use App\Inputs;

class EloquentInputRepository implements InputRepository
{
    public function list()
    {
        return Inputs::get();
    }
}

