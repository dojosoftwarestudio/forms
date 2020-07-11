<?php

namespace App\Repositories;

interface FormsRepository
{
    public function list();
    public function findById($id);
    public function store($data);
    public function update($data);
    public function destroy($id);
    public function share();

}
