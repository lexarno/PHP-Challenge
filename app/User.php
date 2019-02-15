<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Events\UserCreated;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'plan_id', 
        'name', 
        'email', 
        'password',
        'cpf',
        'cep',
        'address',
        'complement',
        'number',
        'district',
        'uf',
        'city',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dispatchesEvents = [
        'created' => UserCreated::class,
    ];

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function user_phone()
    {
        return $this->belongsToMany(Phone::class, 'user_phone', 'user_id', 'phone_id')->withTimestamps();
    }
}
