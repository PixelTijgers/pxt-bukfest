<?php

// Controller namespacing.
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

// Facades.
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

// Models.

// Traits

class AdminController extends Controller
{
    /**
    * Traits
    *
    */

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function changeAdminLanguage($language)
    {
        if (array_key_exists($language, Config::get('cms.common.settings.app_locales'))) {
            request()->session()->put('locale', $language);
        }
        return Redirect::back();
    }
}
