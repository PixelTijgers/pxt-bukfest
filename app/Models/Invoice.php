<?php

// Model Namespacing.
namespace App\Models;

// Facades.
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Traits.
use Spatie\Permission\Traits\HasRoles;

class Invoice extends Model
{
    /**
     * Traits
     *
     */
     use HasFactory;
     use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id_invoice',
        'client_id',
        'vat',
        'invoice_date',
        'is_payed'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'vat' => 'integer',
        'invoice_date' => 'datetime',
        'is_payed' => 'boolean',
    ];

    /**
     * Model relations.
     *
     */
    public function client()
    {
        return $this->belongsTo(\App\Models\Client::class);
    }

    /**
     * Model relations.
     *
     */
    public function invoiceRules()
    {
        return $this->hasMany(\App\Models\InvoiceRules::class);
    }
}
