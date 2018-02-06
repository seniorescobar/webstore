<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Administrator extends Authenticatable
{
	protected $table = 'administrator';
	protected $guard = 'administrator';
	public $timestamps = false;
	protected $primaryKey = 'email';
	public $incrementing = false;

    protected $fillable = [
        'email', 'first_name', 'last_name',
    ];

    protected $hidden = [
        'password', 
    ];
}
