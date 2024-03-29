<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['users_id', 'insurance_price', 'total_price', 'transaction_status', 'code', 'shipping_price'];

    protected $hidden = [
       
    ];

    public function user() 
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
