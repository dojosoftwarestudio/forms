<?php

namespace App\Http\Controllers;

use App\Repositories\GroupsInputsRepository;
use Illuminate\Http\Request;

class GroupInputController extends Controller
{
    protected $repository;

    public function __construct(GroupsInputsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function list()
    {
        return $this->repository->list();
    }
    public function byGroup($id)
    {
        return $this->repository->byGroup($id);
    }
    public function byNoGroup($id)
    {
    return $this->repository->byNoGroup($id);
    }
}
