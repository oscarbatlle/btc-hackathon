<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $fillable = [
        'affiliate_id',
        'hash'
    ];

    /**
     * Get Affiliate
     *
     */
    public function affiliate()
    {
        return $this->belongsTo('App\Models\Affiliate');
    }
    
}
