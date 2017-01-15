<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'user_id',
        'campaign_id',
        'type',
        'wallet',
        'amount'
    ];
}
