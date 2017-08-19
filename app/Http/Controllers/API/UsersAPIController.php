<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\User;

class UsersAPIController extends Controller
{
    private $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $agents = $this->model->all();
        return response()->json(['agents' => $agents]);
    }
}