<?php

namespace App\Http\Controllers;


use App\User;

class UsersAPIController extends Controller
{
    public function index()
    {
        $agents = User::all();
        return response()->json(['agents' => $agents]);
    }
}