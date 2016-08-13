<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Wallet extends Authenticatable
{
    public function orders() {
        return $this->belongsTo('\App\Order', 'address', 'wallet');
    }
}
