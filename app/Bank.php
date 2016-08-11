<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable = [
        'name', 'company', 'active'
    ];

    public function orders() {
    	return $this->hasMany('App\Order');
    }

    public function getOrdersCountAttribute() {
    	return $this->orders()->count();
    }
}
