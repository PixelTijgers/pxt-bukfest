<?php

// Model Namespacing.
namespace App\Models;

// Facades.
use Illuminate\Database\Eloquent\Model;

// Traits.
use Spatie\Permission\Traits\HasRoles;

class Detail extends Model
{
    /**
     * Traits
     *
     */
    use HasRoles;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'details';

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
        'iv_name',
        'iv_street',
        'iv_zip_code',
        'iv_location',
        'iv_country',
        'email',
        'phone',
        'mobile',
        'vat',
        'coc',
        'bank'
    ];
}
