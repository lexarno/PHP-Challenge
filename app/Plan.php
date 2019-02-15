<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'name',
        'amount',
        'description',
    ];

    public function getAmountAttribute($value)
    {
        if (isset($value)) {
            return convertToMoney($value);
        }
    }

    public function setAmountAttribute($value)
    {
        if (isset($value)) {
            $this->attributes['amount'] = convertToDecimal($value);
        }
    }
}
