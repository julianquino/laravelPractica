<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    protected $fillable = ['name', 'prefix', 'turn' ,'subsidiary_id',];


    public function subsidiary() {
        return $this->belongsTo(Subsidiary::class);
    }
}
