<?php

// Namespace
namespace App\Models;

// Facades
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Traits.
use Spatie\MediaLibrary\MediaCollections\File;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasRoles;

class Board extends Model implements HasMedia
{
    /**
     * Traits
     *
     */
    use HasFactory,
        HasRoles,
        InteractsWithMedia;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'board';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'phone',
        'email',
        'boardfunction',
    ];

    /**
     * Register the files into the database with the given collection.
     *
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('boardImage')->singleFile();
    }

    /**
     * Convert the file to given height and width.
     *
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('boardImage')
             ->withResponsiveImages()
             ->performOnCollections('boardImage');
    }
}
