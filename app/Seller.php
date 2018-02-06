<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Seller extends Authenticatable
{
	protected $table = 'seller';
	protected $guard = 'seller';
	public $timestamps = false;
	protected $primaryKey = 'email';

    protected $fillable = [
        'email', 'first_name', 'last_name', 'password',
    ];

    protected $hidden = [
        'password',
    ];
}
