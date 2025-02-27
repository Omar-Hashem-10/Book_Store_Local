<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class FlashSaleFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function name($name)
    {
        return $this->where(function($q) use ($name)
        {
            return $q->whereLike('name->en',  "%$name%")
                ->orWhereLike('name->ar', "%$name%");
        });
    }

    public function description($description)
    {
        return $this->where(function($q) use ($description)
        {
            return $q->whereLike('description->en',  "%$description%")
                ->orWhereLike('description->ar',  "%$description%");
        });
    }
}
