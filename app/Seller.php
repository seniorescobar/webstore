<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Seller extends Authenticatable
{
    protected $table = 'seller';
    protected $guard = 'seller';
    public $timestamps = false;
    protected $primaryKey = 'email';
    public $incrementing = false;
    public $remember_token=false;

    protected $fillable = [
        'email', 'first_name', 'last_name',
    ];

    protected $hidden = [
        'password',
    ];
}
