<?php

// Controller namespacing.
namespace App\Http\Requests;

// Other.
use Illuminate\Foundation\Http\FormRequest;

class SponsorRequest extends FormRequest
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
            'name'  => 'required|string|max:255|unique:sponsors,name'  . (@$this->sponsor->id ? ',' . $this->sponsor->id : null),
            'url'   => 'required|string|url|max:255|unique:sponsors,url'  . (@$this->sponsor->id ? ',' . $this->sponsor->id : null),
        ];
    }
}
