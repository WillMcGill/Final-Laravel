<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserCollection;

class UserController extends Controller
{
    public function index()
    {
        return new UserCollection(User::all());
    }

    public function currentUser()

    {
            return new UserCollection(User::where('id', request('id'))->get());
    }
}
