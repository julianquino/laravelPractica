<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'company_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function company() {
        return $this->hasOne('App\Company','id','company_id');
    }

    public function isPermittedEditShift(Company $company, Subsidiary $subsidiary, Shift $shift) {
        if($this->isOwnerCompany($company) || $this->isCreatorSubsidiary($subsidiary) || $this->isCreatorShift($shift)) {
            return true;
        }
        return false;
    }
    public function isPermittedEditSubsidiary(Company $company, Subsidiary $subsidiary){
        if($this->isOwnerCompany($company) || $this->isCreatorSubsidiary($subsidiary)) {
            return true;
        }
        return false;
    }
    public function isOwnerCompany(Company $company) {
        if($company->owner_id == $this->id) {
            return true;
        }
        return false;
    }

    public function isCreatorSubsidiary(Subsidiary $subsidiary) {
        if($subsidiary->creator_id == $this->id) {
            return true;
        }
        return false;
    }

    public function isCreatorShift(Shift $shift) {
        if($shift->creator_id == $this->id) {
            return true;
        }
        return false;
    }

    public function roles(){
        return $this->belogsToMany(App\Role);
    }
    
    public function hasAnyRole($roles) {
        if(is_array($roles)){
            foreach ($roles as $role) {
                if($this->roles()->where('name',$role)->first()){
                    return true;
                }
            }
        } else {
            if($this->roles()->where('name',$role)->first()){
                    return true;
            }
        }
        return false;
    }

}
