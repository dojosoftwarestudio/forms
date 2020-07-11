<?php

namespace App\Http\Controllers;

use App\Repositories\FormsGroupsRepository;
use Illuminate\Http\Request;

class FormGroupController extends Controller
{
    protected $repository;

    public function __construct(FormsGroupsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function list()
    {
        return $this->repository->list();
    }
    public function byForm($id)
    {
        return $this->repository->byForm($id);
    }

}
