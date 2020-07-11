<?php

namespace App\Repositories\Eloquent;

use App\Repositories\GroupsRepository;
use App\Groups;

class EloquentGroupsRepository implements GroupsRepository
{
    public function list()
    {
        return Groups::get();
    }
}
