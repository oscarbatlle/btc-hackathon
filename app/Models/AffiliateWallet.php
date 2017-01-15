<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AffiliateWallet extends Model
{
    protected $table = "affiliate_wallets";

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
