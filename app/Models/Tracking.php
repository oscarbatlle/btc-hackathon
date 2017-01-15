<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    protected $fillable = [
        'campaign_id',
        'clicks',
        'conversions'
    ];

    /**
     * Get campaign
     *
     */
    public function campaign()
    {
        return $this->belongsTo('App\Models\Campaign');
    }
    
}
