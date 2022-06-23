<?php

// Model Namespacing.
namespace App\Models;

// Facades.
use Illuminate\Database\Eloquent\Model;

// Traits.
use Spatie\MediaLibrary\MediaCollections\File;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

// Scopes.
use App\Scopes\PublishedScope;

class PageSlide extends Model implements HasMedia
{
    /**
     * Traits
     *
     */
    use InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'page_id',
        'subtitle',
        'title',
        'caption',
        'alt',
        'slug',
        '_lft',
    ];

    /**
     * Register the files into the database with the given collection.
     *
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('pageSliderImage')->singleFile();
    }

    /**
     * Convert the file to given height and width.
     *
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('pageSliderImage')
            ->withResponsiveImages()
            ->performOnCollections('pageSliderImage');
    }
}
