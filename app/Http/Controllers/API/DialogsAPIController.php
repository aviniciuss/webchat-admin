<?php

namespace App\Http\Controllers\API;

use App\Client;
use App\Dialog;
use App\Http\Controllers\Controller;
use App\Http\Requests\DialogFormRequest;
use App\Traits\Transformable;
use App\Transformers\DialogTransformer;

class DialogsAPIController extends Controller
{
    use Transformable;

    private $model;

    public function __construct(Dialog $model)
    {
        $this->model = $model;
    }

    public function show($id)
    {
        $dialog = $this->model->find($id);
        return $this->transform($dialog, DialogTransformer::class);
    }

    public function store(DialogFormRequest $request)
    {
        $client = new Client(['name' => $request->get('client_name')]);
        $client->save();

        $dialog = new Dialog(['client_id' => $client->id, 'channel' => $request->get('client_channel')]);
        $dialog->save();

        return response()->json($this->transform($dialog, DialogTransformer::class), 201);
    }
}