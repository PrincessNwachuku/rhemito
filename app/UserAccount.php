<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAccount extends Model
{
    //
    protected $fillable = [
        'account_name', 'account_number', 'user_id', 'bank_name'
    ];
    
    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }
}
