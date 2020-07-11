<?php

namespace App\Repositories\Eloquent;

use App\Repositories\FormsRepository;
use App\Forms;

class EloquentFormsRepository implements FormsRepository
{
    public function list()
    {
        return Forms::orderBy('id', 'desc')->get()->map->format();
    }
    public function findById($id)
    {
        $form = Forms::findOrFail($id);
        $form->type;
        return $form;
    }
    public function store($data)
    {
        $data['status']='0';
        $data['reg_del'] = '0';
        $data['user_mod'] = 'app';
        Forms::create($data);
    }
    public function update($data)
    {
        $data['status'] = '0';
        $data['reg_del'] = '0';
        $data['user_mod'] = 'app';
        $form = Forms::findOrFail($data['id']);
        $form->name = $data['name'];
        $form->code = $data['code'];
        $form->types_forms_id = $data['types_forms_id'];
        $form->status = $data['status'];
        $form->reg_del = "0";
        $form->user_mod = "update_app";
        $form->save();
    }
    public function destroy($id)
    {
        $form = Forms::findOrFail($id)->delete();
    }
    public function share()
    {

    }
}
