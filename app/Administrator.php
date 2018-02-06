<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Administrator extends Authenticatable
{
	protected $table = 'administrator';
	protected $guard = 'administrator';
	public $timestamps = false;
	protected $primaryKey = 'email';

    protected $fillable = [
        'email', 'first_name', 'last_name', 'password',
    ];

    protected $hidden = [
        'password', 
    ];
}
