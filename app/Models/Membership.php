<?php

// Model Namespacing.
namespace App\Models;

// Facades.
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Traits.
use Spatie\Permission\Traits\HasRoles;

class Membership extends Model
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
         'name',
         'contribution',
         'contribution_first_half',
         'contribution_second_half',
     ];

     /**
      * The attributes that should be cast.
      *
      * @var array
      */
     protected $casts = [
         'contribution' => 'float',
         'contribution_first_half' => 'float',
         'contribution_second_half' => 'float',
     ];
}
