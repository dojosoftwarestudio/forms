<?php

namespace App\Repositories\Eloquent;

use App\Repositories\GroupsInputsRepository;
use App\GroupsInputs;
use App\Groups;

class EloquentGroupsInputsRepository implements GroupsInputsRepository
{
    public function list()
    {
        return GroupsInputs::get();
    }
    public function byGroup($id){
        $group = Groups::findOrFail($id);
        return $group->inputs;
    }
    public function byNoGroup($id)
    {
        return null;
    }
}
