<?php

// Model Namespacing.
namespace App\Models;

// Facades.
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Traits.
use Spatie\Permission\Traits\HasRoles;

class Member extends Model
{
    /**
     * Traits
     *
     */
     use HasFactory,
         HasRoles;

   /**
    * The attributes that are mass assignable.
    *
    * @var string[]
    */
    protected $fillable = [
        'team_id',
        'membership_id',
        'name',
        'email',
        'phone',
        'mobile',
        'street',
        'zip_code',
        'location',
        'country',
        'birthday',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'team_id' => 'integer',
        'membership_id' => 'integer',
        'birthday' => 'datetime',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'birthday',
        'created_at',
        'updated_at',
    ];

    /**
    * Model relations.
    *
    */
    public function team()
    {
        return $this->belongsTo(\App\Models\Team::class);
    }

    /**
    * Model relations.
    *
    */
    public function membership()
    {
        return $this->belongsTo(\App\Models\Membership::class);
    }
}
