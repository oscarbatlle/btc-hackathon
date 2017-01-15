<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Affiliate extends Model
{
    protected $fillable = [
        'company',
        'user_id',
        'address1',
        'address2',
        'city',
        'country',
        'state',
        'zip',
        'phone',
        'role',
        'status'
    ];

    /**
     * Get User
     *
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    

    /**
     * Get Campaigns
     *
     */
    public function campaign()
    {
        return $this->hasMany('App\Models\Campaign');
    }

    public function apikey()
    {
        return $this->hasOne('App\Models\ApiKey');
    }

    public function wallet()
    {
        return $this->hasOne('App\Models\AffiliateWallet');
    }
    
    
}
