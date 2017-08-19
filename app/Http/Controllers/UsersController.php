<?php

namespace App\Http\Controllers;


use App\Events\UserCreated;
use App\Http\Requests\UserFormRequest;
use App\Traits\Transformable;
use App\Transformers\AgentTransformer;
use App\User;

class UsersController extends Controller
{
    use Transformable;

    public function index()
    {
        $agents = User::all();
        return $this->transform($agents, AgentTransformer::class);
    }

    public function store(UserFormRequest $request)
    {
        $user = new User($request->all());
        $user->save();

        event(new UserCreated($user));

        return response()->json($user, 201);
    }
}