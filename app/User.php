<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;
use App\Settings;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName', 'lastName', 'email', 'password', 'phone', 'is_activated', 'hash', 'subscribed'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function wallets() {
        return $this->hasMany('App\Wallet');
    }

    public function orders() {
        return $this->hasMany('App\Order');
    }

    public function dailyLimitUsed() {
        return $this->orders()->where('status', '!=', 'cancelled')->whereDate('created_at', '=', Carbon::today()->toDateString())->sum('amount');
    }

    public function monthlyLimitUsed() {
        return $this->orders()->where('status', '!=', 'cancelled')->whereDate('created_at', '>', Carbon::today()->subMonth()->toDateString())->sum('amount');
    }

    public function dailyLimitLeft() {
        return ($this->personalLimits ? $this->dailyLimit : Settings::getParam('dailyLimit')) - $this->dailyLimitUsed();
    }

    public function monthlyLimitLeft() {
        return ($this->personalLimits ? $this->dailyLimit : Settings::getParam('monthlyLimit')) - $this->monthlyLimitUsed();
    }

    public function hasPending() {
        return Order::whereUserId($this->id)->whereStatus('pending')->exists();
    }
}
