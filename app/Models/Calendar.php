<?php

// Model Namespacing.
namespace App\Models;

// Facades.
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Enums
use App\Enums\PublishedState;

// Traits.
use Spatie\MediaLibrary\MediaCollections\File;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasRoles;

// Scopes.
use App\Scopes\PublishedScope;

class Calendar extends Model implements HasMedia
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
    protected $table = 'calendar';

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        return static::addGlobalScope(new PublishedScope);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'caption',
        'content',
        'meta_title',
        'meta_description',
        'meta_tags',
        'og_title',
        'og_description',
        'og_slug',
        'og_type',
        'og_locale',
        'visible',
        'status',
        'published_at',
        'unpublished_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'visible' => 'boolean',
        'state' => PublishedState::class,
        'published_at' => 'datetime',
        'unpublished_at' => 'datetime',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'published_at',
        'unpublished_at',
        'created_at',
        'updated_at',
    ];

    /**
     * Register the files into the database with the given collection.
     *
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('calendarImage')->singleFile();
        $this->addMediaCollection('ogImage')->singleFile();
    }

    /**
     * Convert the file to given height and width.
     *
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('calendarImage')
             ->withResponsiveImages()
             ->performOnCollections('calendarImage');
    }
}
