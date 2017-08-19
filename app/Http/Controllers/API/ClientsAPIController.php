<?php

namespace App\Http\Controllers\API;

use App\Client;
use App\Http\Controllers\Controller;
use App\Traits\Transformable;
use App\Transformers\ClientTransformer;

class ClientsAPIController extends Controller
{
    use Transformable;

    private $model;

    public function __construct(Client $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $clients = $this->model->all()->sortBy('created_at');
        return $this->transform($clients, ClientTransformer::class);
    }
}