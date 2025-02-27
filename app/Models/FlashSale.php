<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class FlashSale extends Model
{
    /** @use HasFactory<\Database\Factories\FlashSaleFactory> */
    use HasFactory, HasTranslations, Filterable;
    protected $fillable = ['name', 'description', 'date', 'time', 'is_active'];

    public $translatable = ['name', 'description'];
    protected $casts = ['name' => 'array', 'description' => 'array'];
}
