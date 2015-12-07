<?php

namespace Faztor;

use Illuminate\Database\Eloquent\Model;
use Faztor\Order;

class OrderDetail extends Model
{
    /**
     * Get the order that owns the detail.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
