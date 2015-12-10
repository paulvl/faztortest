<?php

namespace Faztor;

use Roids\Database\Eloquent\Model;

class ProductCategory extends Model
{
    /**
     * Get the products for the category.
     */
    public function products()
    {
        return $this->hasMany(Products::class, 'category_id');
    }
}
