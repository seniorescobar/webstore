<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'image';
    public $timestamps = false;
    protected $primaryKey = 'filepath';
    public $incrementing = false;

    protected $fillable = [
        'filepath', 'item_id',
    ];
}
