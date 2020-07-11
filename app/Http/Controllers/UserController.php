<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Repositories\UsersRepository;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    protected $repository;

    public function __construct(UsersRepository $repository)
    {
        $this->repository =  $repository;
    }
    public function list()
    {
        $users = $this->repository->list();
        return $users;

    }
    public function store()
    {
        $v = Validator::make(request()->all(), [
            'name' => 'required',
            'email' => 'email',

        ],[
            'name.required' => 'Name requerido',
            'email.email' => 'email',
        ]);
        if ($v->fails()) {
            dd($v->errors());
        }else{
            echo $this->repository->create(request()->all());
        }
    }
    public function show($id)
    {
        return $this->repository->find($id);
    }
    public function update()
    {
        echo $this->repository->update(request()->all());
    }
    public function destroy($id)
    {
        echo $this->repository->destroy($id);
    }
    public function addRole(){
        $role = $this->validateRole(request()->all());
        $data = request()->all();
        echo $this->repository->addRole($data['id'], $data['id_role']);
    }
    private function validateRole($role){
        $this->repository->validateRole($role);
    }
}
