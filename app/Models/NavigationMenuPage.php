<?php

// Namespace
namespace App\Models;

// Facades
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NavigationMenuPage extends Model
{
    /**
    * Traits
    *
    */
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'navigation_menu_page';
}
