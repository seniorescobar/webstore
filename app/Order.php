<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    public $timestamps = false;
    // protected $primaryKey = 'id';
    public $incrementing = true;

    protected $fillable = [
        'customer_email', 'status_id',
    ];

    public function orderedItems()
    {
        return $this->hasMany('App\OrderedItems', 'order_id', 'id');
    }
}
