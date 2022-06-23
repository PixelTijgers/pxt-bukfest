<?php

// Controller namespacing.
namespace App\Http\Controllers\Front\Modules;
use App\Http\Controllers\Controller;

// Facades.

// Models.

// Traits

class AboutController extends Controller
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
    public function index()
    {
        return view('front.modules.about.index');
    }
}
