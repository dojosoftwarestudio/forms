<?php

namespace App\Repositories\Eloquent;

use App\Repositories\FormsGroupsRepository;
use App\FormsGroups;
use App\Forms;

class EloquentFormsGroupsRepository implements FormsGroupsRepository
{
    public function list()
    {
        return FormsGroups::get();
    }
    public function byForm($id){
        $form =  Forms::findOrFail($id);
        return $form->groups;
    }

}
