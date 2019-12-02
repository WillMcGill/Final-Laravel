<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class UserRoutes extends Model
{
    //
    public function Users(){
        return$this->belongsTo('App/User', 'id');
    }
    public function Routes(){
        return$this->belongsTo('App/Routes', 'id');
    }

    protected $fillable = ['user_id', 'route_id', 'rating', 'comments'];
  
}
