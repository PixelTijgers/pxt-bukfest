<?php

// Controller namespacing.
namespace App\Http\Requests;

// Other.
use Illuminate\Foundation\Http\FormRequest;

class AdministratorRequest extends FormRequest
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
            'name'      =>  'required|string|max:255',
            'email'     =>  'required|email:rfc,dns|max:255|unique:administrators,email' . (@$this->administrator->id ? ',' . $this->administrator->id : null),
            'phone'     =>  'required|phone|max:115|unique:administrators,phone' . (@$this->administrator->id ? ',' . $this->administrator->id : null),
            'password'  =>  (@$this->administrator->id ? 'nullable' : 'required') . '|between:8,20|confirmed'
        ];
    }
}
