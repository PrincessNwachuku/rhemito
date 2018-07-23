<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $fillable = [
        'recipient_name', 'recipient_phone', 'user_id', 'recipient_bank', 'recipient_email', 'purpose', 'recipient_account_number',
        'amount'
    ];
    
    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }
}
