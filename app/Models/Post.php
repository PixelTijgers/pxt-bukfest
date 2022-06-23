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

class Post extends Model implements HasMedia
{
    /**
     * Traits
     *
     */
    use HasFactory,
        HasRoles,
        InteractsWithMedia;

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
        'administrator_id',
        'category_id',
        'slug',
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
        'status',
        'published_at',
        'unpublished_at',
        'last_edited_administrator_id',
        'last_edit_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'administrator_id' => 'integer',
        'category_id' => 'integer',
        'state' => PublishedState::class,
        'published_at' => 'datetime',
        'unpublished_at' => 'datetime',
        'last_edited_administrator_id' => 'integer',
        'last_edit_at' => 'datetime',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'published_at',
        'unpublished_at',
        'last_edit_at',
        'created_at',
        'updated_at',
    ];

    /**
     * Model relations.
     *
     */
    public function administrator()
    {
        return $this->belongsTo(\App\Models\Administrator::class);
    }

    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class);
    }

    /**
     * Register the files into the database with the given collection.
     *
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('postImage')->singleFile();
        $this->addMediaCollection('ogImage')->singleFile();
    }

    /**
     * Convert the file to given height and width.
     *
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('postImage')
             ->withResponsiveImages()
             ->performOnCollections('postImage');
    }
}
