<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{

    public function posts(){
        return $this->hasMany('App\Post');
    }

}
