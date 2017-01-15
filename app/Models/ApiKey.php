<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApiKey extends Model
{
    protected $fillable = ['campaign_id'];

    /**
     * Get Affiliate
     *
     */
    public function affiliate()
    {
        return $this->belongsTo('App\Models\Affiliate');
    }
    
}
