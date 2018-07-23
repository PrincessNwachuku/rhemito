<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    //
    protected $fillable = [
        'from_country', 'from_country', 'rate', 'transfer_fee'
    ];
}
