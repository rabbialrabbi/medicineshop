<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    public $guarded = [];

    public function item()
    {
       return $this->belongsTo(Item::class);
    }
}
