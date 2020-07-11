<?php

namespace App\Http\Controllers;

use App\Repositories\FormsRepository;
use Illuminate\Http\Request;
use App\Forms;
use App\Bussines\FormBussines;

class FormController extends Controller
{
    protected $repository;

    public function __construct(FormsRepository $repository)
    {
        $this->repository =  $repository;
        $this->bussinesForm = new FormBussines();
    }
    public function index()
    {
        return view('wellcome');
    }
    public function list()
    {
        return $this->repository->list();
    }
    public function edit($id)
    {
        $form = $this->bussinesForm->editFormat($this->repository->findById($id));
        $form = Forms::findOrFail($id);
        return $form;
    }
    public function update(Request $req)
    {
        $this->repository->update($req->all());
        return "ok";
    }
    public function store(Request $req)
    {
        $this->repository->store($req->all());
        return 'ok';
    }
   public function destroy(Request $id)
   {
       $this->repository->destroy($id->all()['id']);
       return "deleted";
   }
   public function share()
   {
       $this->repository->share();
   }
}
