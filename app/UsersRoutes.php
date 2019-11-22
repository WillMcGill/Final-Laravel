<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersRoutes extends Model
{
    //
    public function Users(){
        return$this->belongsTo('App/User', 'id');
    }
    public function Routes(){
        return$this->belongsTo('App/Route', 'id');
    }
}
