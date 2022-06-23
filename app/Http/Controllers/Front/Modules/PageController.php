<?php

// Controller namespacing.
namespace App\Http\Controllers\Front\Modules;
use App\Http\Controllers\Controller;

// Facades.

// Models.
use App\Models\Page;

// Traits

class PageController extends Controller
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
        return view('front.modules.page.index');
    }

    /**
    * Display a listing of the page.
    *
    * @return \Illuminate\Http\Response
    */
    public function sitemap()
    {
        return view('front.modules.page.sitemap');
    }
}
