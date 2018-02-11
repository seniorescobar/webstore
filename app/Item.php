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
        'name', 'description', 'price', 'activated',
    ];

    // protected $hidden = ['id'];
    // protected $appends = ['url'];

    public function getUrlAttribute()
    {
        return route('item.index', ['id' => $this->id]);
    }

    // public function images()
    // {
    //     return $this->hasMany('App\Image');
    // }
    //
    public function ratings()
    {
        return $this->hasMany('App\Rating');
    }
}
