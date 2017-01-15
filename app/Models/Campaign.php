<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = [
        'name',
        'url',
        'type',
        'description',
        'daily_budget',
        'tracking',
        'payout',
        'affiliate_id',
        'status'
    ];

    /**
     * Get Affiliate
     *
     */
    public function affiliate()
    {
        return $this->belongsTo('App\Models\Affiliate');
    }

    /**
     * Get tracking link
     *
     */
    public function tracking()
    {
        return $this->hasOne('App\Models\Tracking');
    }

    /**
     * Get Transactions
     *
     */
    public function transaction()
    {
        return $this->hasMany('App\Models\Transaction');
    }
}
