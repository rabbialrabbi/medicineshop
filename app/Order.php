<?php

namespace App;


use App\MR;
use App\User;
use App\OrderDetails;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function order_details()
    {
        return $this->hasMany(OrderDetails::class);
    }
}
