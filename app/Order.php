<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'bank_id', 'wallet', 'amount', 'bitcoins', 'total', 'receipt', 'status', 'created_at', 'updated_at',
        'img_updated_at', 'completed_at', 'hash', 'email', 'notes', 'selfie'
    ];

    public function bank() {
    	return $this->belongsTo('App\Bank');
    }

    public function user() {
    	return $this->belongsTo('App\User');
    }

    public function wallet() {
        return $this->hasOne('App\Wallet', 'address', 'wallet');
    }
}
