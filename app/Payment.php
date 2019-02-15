<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'user_id', 
        'card_name', 
        'card_number', 
        'card_cvv',
        'card_expiration',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
