<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $fillable = [
        'number',
    ];
    
    public function user_phone()
    {
        return $this->belongsToMany(User::class, 'user_phone', 'phone_id', 'user_id')->withTimestamps();
    }
}
