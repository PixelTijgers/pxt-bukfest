<?php

// Controller namespacing.
namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;

// Facades.

// Models.
use App\Models\Page;

// Traits

class SitemapController extends Controller
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
        return response()
               ->view('front.sitemap', [
                   'home' => $this->returnHomePage(),
                   'expertises' => $this->returnExpertises(),
                   'about' => $this->returnAbout(),
                   'contact' => $this->returnContact(),
                   'disclaimer' => $this->returnDisclaimer(),
                   'algemeen' => $this->returnTOS(),
                   'privacy' => $this->returnPrivacy(),
                   'cookie' => $this->returnCookie(),
               ])
               ->header('Content-Type', 'text/xml');
    }

    /**
    * Return a model of the home page.
    *
    * @return Model
    */
    protected function returnHomePage()
    {
        // Get and return the homepage.
        // If the current URL does not exists, throw an 404 not found.
        return Page::where('slug', '/')->firstOrFail();
    }

    /**
    * Return a model of the expertise page.
    *
    * @return Model
    */
    protected function returnExpertises()
    {
        // Get and return the homepage.
        // If the current URL does not exists, throw an 404 not found.
        return Page::where('slug', '/expertises')->firstOrFail();
    }

    /**
    * Return a model of the expertise page.
    *
    * @return Model
    */
    protected function returnAbout()
    {
        // Get and return the homepage.
        // If the current URL does not exists, throw an 404 not found.
        return Page::where('slug', '/over-pixeltijgers')->firstOrFail();
    }

    /**
    * Return a model of the expertise page.
    *
    * @return Model
    */
    protected function returnContact()
    {
        // Get and return the homepage.
        // If the current URL does not exists, throw an 404 not found.
        return Page::where('slug', '/contact')->firstOrFail();
    }

    /**
    * Return a model of the expertise page.
    *
    * @return Model
    */
    protected function returnDisclaimer()
    {
        // Get and return the homepage.
        // If the current URL does not exists, throw an 404 not found.
        return Page::where('slug', '/disclaimer')->firstOrFail();
    }

    /**
    * Return a model of the expertise page.
    *
    * @return Model
    */
    protected function returnTOS()
    {
        // Get and return the homepage.
        // If the current URL does not exists, throw an 404 not found.
        return Page::where('slug', '/disclaimer')->firstOrFail();
    }

    /**
    * Return a model of the expertise page.
    *
    * @return Model
    */
    protected function returnPrivacy()
    {
        // Get and return the homepage.
        // If the current URL does not exists, throw an 404 not found.
        return Page::where('slug', '/disclaimer')->firstOrFail();
    }

    /**
    * Return a model of the expertise page.
    *
    * @return Model
    */
    protected function returnCookie()
    {
        // Get and return the homepage.
        // If the current URL does not exists, throw an 404 not found.
        return Page::where('slug', '/disclaimer')->firstOrFail();
    }
}
