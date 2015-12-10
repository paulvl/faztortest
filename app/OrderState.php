<?php

namespace Faztor;

use Roids\Database\Eloquent\Model;
use Faztor\Order;

class OrderState extends Model
{
    /**
     * Get the orders for the state.
     */
    public function orders()
    {
        return $this->hasMany(Order::class, 'state_id');
    }
}
