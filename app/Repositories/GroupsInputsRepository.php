<?php

namespace App\Repositories;

interface GroupsInputsRepository
{
    public function list();
    public function byGroup($id);
    public function byNoGroup($id);

}
