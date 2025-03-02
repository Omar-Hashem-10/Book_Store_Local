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

    public function date($date)
    {
        return $this->whereLike('date', "$date%");
    }

    public function time($time)
    {
        return $this->whereLike('time', "$time%");
    }

    public function isActive($is_active)
    {
        return $this->whereLike('is_active', "$is_active%");
    }
}
