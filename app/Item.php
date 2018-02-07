<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'item';
    public $timestamps = false;
    // protected $primaryKey = 'id';
    public $incrementing = true;

    protected $fillable = [
        'name', 'description', 'price',
    ];

    public function images()
    {
        return $this->hasMany('App\Image');
    }

    public function ratings()
    {
        return $this->hasMany('App\Rating');
    }
}
