<?php

// Model Namespacing.
namespace App\Models;

// Facades.
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Traits.
use Spatie\Permission\Traits\HasRoles;

class Team extends Model
{
    /**
     * Traits
     *
     */
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'name_short'
    ];
}
