<?php

namespace App\Http\Controllers;


use App\Events\UserCreated;
use App\Http\Requests\UserFormRequest;
use App\User;

class UsersController extends Controller
{
    public function index()
    {
        $agents = User::all();
        return response()->json(['agents' => $agents]);
    }

    public function store(UserFormRequest $request)
    {
        $user = new User($request->all());
        $user->save();

        event(new UserCreated($user));

        return response()->json($user, 201);
    }
}