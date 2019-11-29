<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\UserRouteCollection;
use App\UserRoutes;

class UsersRoutesController extends Controller
{

public function comments(){
    return new UserRouteCollection(UserRoutes::where('route_id', request('route_id'))->get());
}}
