<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Traits\Transformable;
use App\Transformers\AgentTransformer;
use App\User;

class UsersAPIController extends Controller
{
    use Transformable;

    private $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $agents = $this->model->all();
        return $this->transform($agents, AgentTransformer::class);
    }
}