<?php

namespace Roids\Database\Eloquent;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Support\Facades\Schema;

class Model extends EloquentModel
{
    public static function getPrimaryKeyName()
    {
        return with(new static)->getKeyName();
    }

    public static function getTableName()
    {
        return with(new static)->getTable();
    }

    public static function getTableColumnNames()
    {
        return Schema::getColumnListing(self::getTableName());
    }
}