<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name', 'description', 'owner_id', ];

    public function subsidiaries(){
        return $this->hasMany(Subsidiary::class);
    }
    public function user(){
    	return $this->belongsTo(User::class,'owner_id','id');
    }
}
