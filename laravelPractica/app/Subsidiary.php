<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subsidiary extends Model
{
    protected $fillable = ['name', 'address', 'company_id', 'creator_id', ];

	public function shifts() {
        return $this->hasMany(Shift::class);
    }
    public function company() {
        return $this->belongsTo(Company::class);
    }

    public static function boot() {
        parent::boot();
        static::deleting(function($subsidiary) { 
             $subsidiary->shifts()->delete();

        });
    }
}
