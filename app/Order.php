<?php

namespace Faztor;

use Illuminate\Database\Eloquent\Model;
use Faztor\User;
use Faztor\OrderState;
use Faztor\OrderDetail;

class Order extends Model
{
    /**
     * Get the user that owns the order.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the order's state.
     */
    public function state()
    {
        return $this->belongsTo(OrderState::class, 'state_id');
    }

    /**
     * Get the details for the purchase order.
     */
    public function details()
    {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }
}
