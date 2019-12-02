<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\UserRouteCollection;
use App\UserRoutes;


class UsersRoutesController extends Controller
{

public function comments(){
    return new UserRouteCollection(UserRoutes::where('route_id', request('route_id'))->get());
}

public function addComments(Request $request, UserRoutes $userroutes){
    UserRoutes::create(['user_id' => request('user'), 'route_id' => request('route'),
       'comments' => request('comment'), 'rating' => request('rating')]);

       return response()->json('Success!! Maybe...');
}

public function deleteComments(Request $request, UserRoutes $userroutes){
    UserRoutes::where('route_id', request('id'))->delete();

       return response()->json('Success!! Maybe...');
}

}