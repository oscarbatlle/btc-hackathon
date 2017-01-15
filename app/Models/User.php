<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get affiliate account
     *
     */
    public function affiliate()
    {
        return $this->hasOne('App\Models\Affiliate');
    }

    public function enduserwallet()
    {
        return $this->hasOne('App\Models\EndUserWallet');
    }

    public function transactions()
    {
        return $this->hasMany('App\Models\Transaction');
    }
    
    
    
}
