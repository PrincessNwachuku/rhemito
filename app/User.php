<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'city', 'address', 'dob', 'postal_code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function userAccounts() {
        return $this->hasMany('App\UserAccount');
    }
    
    public function transactions() {
        return $this->hasMany('App\Transaction');
    }
    
    public function beneficiaries() {
        return $this->hasMany('App\Beneficiary');
    }
}
