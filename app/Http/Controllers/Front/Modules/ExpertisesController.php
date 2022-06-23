<?php

// Controller namespacing.
namespace App\Http\Controllers\Front\Modules;
use App\Http\Controllers\Controller;

// Facades.

// Models.
use App\Models\Page;

// Traits

class ExpertisesController extends Controller
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
        return view('front.modules.expertises.index');
    }

    /**
    * Show the expertise.
    *
    * @return \Illuminate\Http\Response
    */
    public function show()
    {
        return view('front.modules.expertises.show');
    }
}
