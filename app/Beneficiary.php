<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beneficiary extends Model {

    //
    protected $table = "beneficiaries";
    protected $fillable = ['recipient_name', 'recipient_phone', 'user_id', 'recipient_bank', 'recipient_email','recipient_account_number'
    ];

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

}
