<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
	protected $table = 'customer';
	protected $guard = 'customer';
	public $timestamps = false;
	protected $primaryKey = 'email';

    protected $fillable = [
        'email', 'fist_name', 'last_name', 'password', 'home_address', 'phone_number',
    ];

    protected $hidden = [
        'password',
    ];
}
