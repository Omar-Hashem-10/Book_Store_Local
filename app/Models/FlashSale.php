<?php

namespace App\Models;

use Spatie\Image\Enums\Fit;
use EloquentFilter\Filterable;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class FlashSale extends Model implements HasMedia
{
    /** @use HasFactory<\Database\Factories\FlashSaleFactory> */
    use HasFactory, HasTranslations, Filterable, InteractsWithMedia;
    protected $fillable = ['name', 'description', 'date', 'time', 'is_active'];

    public $translatable = ['name', 'description'];
    protected $casts = ['name' => 'array', 'description' => 'array'];

    public function registerMediaConversions(?Media $media = null): void
{
    $this
        ->addMediaConversion('preview')
        ->fit(Fit::Contain, 300, 300)
        ->nonQueued();
}
}
