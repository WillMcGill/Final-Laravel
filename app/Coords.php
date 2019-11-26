<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coords extends Model
{
    public function routes(){
        return $this->belongsTo('App/Routes', 'wall_location');
    }

}
