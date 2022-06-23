<?php

// Controller namespacing.
namespace App\Http\Requests;

// Other.
use Illuminate\Foundation\Http\FormRequest;

class SocialRequest extends FormRequest
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
            'social_media_id'   =>  'required|numeric|min:1',
            'content'           =>  'required|string|url|unique:socials,content' . (@$this->social->id ? ',' . $this->social->id : null),
        ];
    }
}
