<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;


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

    
    }
}
