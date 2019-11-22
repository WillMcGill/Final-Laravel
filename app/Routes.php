<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Routes extends Model
{
    public function UsersRoutes(){
        return $this->hasMany('App/UsersRoutes', 'route_id');
    }
}
