<?php
// Namespacing.
namespace App\Mail;

// Facades.
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;

class ContactForm extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $request, $details)
    {
        $this->request = $request;
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->request->email)
                    ->markdown('emails.contact.index')
                    ->with([
                        'name' => $this->request->name,
                        'email' => $this->request->email,
                        'company' => $this->request->company,
                        'website' => $this->request->website,
                        'subject' => $this->request->subject,
                        'message' => $this->request->message,
                        'ip' => $this->details->getIp(),
                        'city' => $this->details->getCity(),
                        'region' => $this->details->getRegion(),
                        'country' => $this->details->getCountry(),
                        'countryCode' => $this->details->getCountryCode(),
                        'latitude' => $this->details->getLatitude(),
                        'longitude' => $this->details->getLongitude()
                    ]);
    }
}
