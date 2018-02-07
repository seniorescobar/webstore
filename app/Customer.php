<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    protected $table = 'customer';
    protected $guard = 'customer';
    public $timestamps = false;
    protected $primaryKey = 'email';
    public $incrementing = false;
    public $remember_token=false;

    protected $fillable = [
        'email', 'fist_name', 'last_name', 'home_address', 'phone_number',
    ];

    protected $hidden = [
        'password',
    ];
}
