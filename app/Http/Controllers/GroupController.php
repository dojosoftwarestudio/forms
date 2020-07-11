<?php

namespace App\Http\Controllers;

use App\Repositories\GroupsRepository;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    protected $repository;

    public function __construct(GroupsRepository $repository)
    {
        $this->repository = $repository;
    }
    public function list()
    {
        return $this->repository->list();
    }

}
