<?php

namespace App\Bussines;

class FormBussines
{
    public function __construct()
    {
    }

    public function editFormat($data)
    {
        $form = array(
                    'id'             => $data->id,
                    'name'           => $data->name,
                    'code'           => $data->code,
                    'types_forms_id' => $data->type->id,
                    'status'         => $data->status,
                    'reg_del'        => $data->reg_del,
                    'user_mod'       => $data->user_mod,
                );
        return $form;
    }

}
