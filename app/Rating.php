<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'rating';
    public $timestamps = false;
    protected $primaryKey = ['customer_email', 'item_id'];
    public $incrementing = false;

    protected $fillable = [
        'rating'
    ];
}
