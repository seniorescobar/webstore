<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderedItems extends Model
{
    protected $table = 'ordered_items';
    public $timestamps = false;
    // protected $primaryKey = 'id';
    public $incrementing = true;

    protected $fillable = [
        'order_id', 'item_id', 'quantity',
    ];

    public function item()
    {
        return $this->hasOne('App\Item', 'id', 'item_id');
    }
}
