<?php

// Controller namespacing.
namespace App\Http\Requests;

// Other.
use Illuminate\Foundation\Http\FormRequest;

class BoardRequest extends FormRequest
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
            'name'              => 'required|string|max:255|unique:board,name'  . (@$this->board->id ? ',' . $this->board->id : null),
            'phone'             => 'nullable|phone|string|max:255',
            'email'             => 'nullable|email:rfc,dns|string|max:255',
            'boardfunction'     => 'required|string|max:255',
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
            'name.unique' => 'Er is al een categorie met deze naam.',
        ];
    }
}
