<?php
namespace App\Repositories;

interface UsersRepository
{
    public function find($id);
    public function list();
    public function create($data);
    public function update($data);
    public function destroy($id);
    public function validateRole($role);
    public function addRole($idUser, $idRole);
}
