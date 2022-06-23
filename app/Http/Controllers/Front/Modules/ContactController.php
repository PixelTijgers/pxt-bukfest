<?php

// Controller namespacing.
namespace App\Http\Controllers\Front\Modules;
use App\Http\Controllers\Controller;

// Facades.
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Adrianorosa\GeoLocation\GeoLocation;

// Request
use App\Http\Requests\ContactFormRequest;

// Models.

// Traits.

// Mails.
use App\Mail\ContactForm;

class ContactController extends Controller
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
        return view('front.modules.contact.index');
    }

    /**
     * Send the form on the contact page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendContactForm(ContactFormRequest $request)
    {
        // Get the IP adres of the user.
        $getIp = (request()->ip() !== '127.0.0.1 '? request()->ip : '141.134.161.188');

        // Get the user details.
        $details = GeoLocation::lookup($getIp);

        Mail::to(config('cms.common.settings.email'))->send(new ContactForm($request, $details));

        // Return back with message.
        return redirect()->route('contact.index')->with([
                'type' => 'success',
                'message' => 'Het bericht is met succes verzonden. We reageren zo spoedig mogelijk!'
            ]
        );
    }
}
