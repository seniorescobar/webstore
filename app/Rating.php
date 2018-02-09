<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'rating';
    public $timestamps = false;

    protected $fillable = [
        'customer_email', 'item_id', 'rating'
    ];
}
