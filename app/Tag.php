<?php

namespace Faztor;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * The products that belong to the tag.
     */
    public function products()
    {
        return $this->belongsToMany(Tag::class, 'product_tags', 'tag_id', 'product_id');
    }
}
