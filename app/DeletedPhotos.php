<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeletedPhotos extends Model
{
    protected $fillable = [
        'hash', 'order_id', 'user_hash', 'type'
    ];
}
