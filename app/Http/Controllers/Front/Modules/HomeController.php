<?php

// Controller namespacing.
namespace App\Http\Controllers\Front\Modules;
use App\Http\Controllers\Controller;

// Facades.

// Models.

// Traits

class HomeController extends Controller
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
        return view('front.modules.home.index');
    }

    /**
    * Return the under development page.
    *
    * @return \Illuminate\Http\Response
    */
    public function underDevelopment()
    {
        return view('front.under-development');
    }
}
