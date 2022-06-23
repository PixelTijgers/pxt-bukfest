<?php

// Model Namespacing.
namespace App\Models;

// Facades.
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Traits.
use Spatie\MediaLibrary\MediaCollections\File;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasRoles;

class Client extends Model implements HasMedia
{
    /**
     * Traits
     *
     */
     use HasFactory,
         HasRoles,
         InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'contact',
        'street',
        'zip_code',
        'location',
        'country',
        'email',
        'phone',
        'mobile',
        'vat',
        'coc'
    ];

    /**
     * Register the files into the database with the given collection.
     *
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('clientImage')->singleFile();
    }

    /**
     * Convert the file to given height and width.
     *
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('clientImage')
             ->withResponsiveImages()
             ->performOnCollections('clientImage');
    }
}
