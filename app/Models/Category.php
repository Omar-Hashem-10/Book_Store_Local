<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory, Filterable,HasTranslations;

    protected $fillable = [
        'name',
        'discount_id'
    ];

    public $translatable = ['name'];


    public function discount() {
        return $this->belongsTo(Discount::class);
    }
}
