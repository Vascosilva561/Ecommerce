<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use App\Order;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'provider',
        'provider_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id', 'id');
    }

    public function address()
    {
        return $this->hasOne(Address::class);
    }
}
