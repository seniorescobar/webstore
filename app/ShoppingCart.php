<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    protected $table = 'shopping_cart';
    public $timestamps = false;
    // protected $primaryKey = 'id';
    public $incrementing = true;

    protected $fillable = [
        'customer_email', 'item_id', 'quantity',
    ];

    public function item()
    {
        return $this->hasOne('App\Item', 'id', 'item_id');
    }
}
