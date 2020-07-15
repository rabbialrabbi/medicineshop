<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public $guarded = [];

    public function generic()
    {
        return $this->belongsTo(Generic::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function itemType()
    {
        return $this->belongsTo(ItemType::class);
    }
}
