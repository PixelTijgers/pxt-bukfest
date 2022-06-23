<?php

// Controller namespacing.
namespace App\Http\Requests;

// Other.
use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'      => 'required|string|max:255',
            'email'     => 'required|email:spoof,dns,rfc|string|max:255',
            'company'   => 'nullable|string|max:255',
            'website'   => 'nullable|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/|string|max:255',
            'subject'   => 'required|string|max:255',
            'message'   => 'required|string|max:255',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Dit veld is verplicht.',
            'email.required' => 'Dit veld is verplicht.',
            'subject.required' => 'Dit veld is verplicht.',
            'message.required' => 'Dit veld is verplicht.',
            'email.email' => 'Opgegeven e-mail adres is ongeldig.',
            'website.regex' => 'Opgegeven website is een ongeldige URL.'
        ];
    }
}
