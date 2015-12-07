<?php

namespace Faztor;

use Illuminate\Database\Eloquent\Model;
use Faztor\Order;
use Faztor\Product;

class OrderDetail extends Model
{
    /**
     * Get the order that owns the detail.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    /**
     * Get the detail's product.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
