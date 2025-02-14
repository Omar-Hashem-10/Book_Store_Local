<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class DiscountFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function code($code)
    {
        return $this->whereLike('code',"$code%");
    }

    public function quantity($quantity)
    {
        return $this->whereLike('quantity',"$quantity%");
    }

    public function percentage($percentage)
    {
        return $this->whereLike('percentage',"$percentage%");
    }

    public function expiryDate($expiryDate)
    {
        return $this->whereLike('expiry_date',"$expiryDate%");
    }
}
