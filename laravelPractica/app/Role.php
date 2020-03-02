<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    public funtion users(){
    	return $this->belongsToMany(App\Role);
    }
}
