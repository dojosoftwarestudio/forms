<?php

namespace App\Repositories\Eloquent;

use App\Repositories\UsersRepository;
use App\User;

class EloquentUsersRepository implements UsersRepository
{
    public function find($id){
        $user = User::findOrFail($id);
        $user->roles;
        $user->person;
        return $user;

    }
    public function list()
    {
        $users = User::orderBy('id', 'desc')->get();
        foreach ($users as $user) {
            $user->roles;
            $user->person;
        }
        return $users->map->format();
    }
    public function create($data)
    {
        $data['status'] = 0;
        $data['user_mod'] = 'postman';
        $data['reg_del'] = 0;
        $data['password'] = bcrypt($data['password']);
        return User::create($data);
    }
    public function update($data)
    {
        $user = User::findOrFail($data['id']);
        $data['status'] = 0;
        $data['user_mod'] = 'postman';
        $data['reg_del'] = 0;
        $data['password'] = bcrypt('789456');
        return $user->update($data);
    }
    public function destroy($id){
        $user = User::findOrFail($id);
        return $user->delete();
    }
    public function validateRole($idUser){
    }
    public function addRole($idUser, $idRole)
    {
        $user = User::findOrFail($idUser);
        $data[0]['roles_id'] = $idRole;
        $data[0]['status'] = 0;
        $data[0]['user_mod'] = 'postman';
        $data[0]['reg_del'] = 0;
        return $user->roles()->attach($data);
    }
}