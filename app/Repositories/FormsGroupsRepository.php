<?php

namespace App\Repositories;

interface FormsGroupsRepository
{
    public function list();
    public function byForm($id);
}
