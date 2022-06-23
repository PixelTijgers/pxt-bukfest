<?php

// Controller namespacing.
namespace App\Http\Requests;

// Other.
use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
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
            'name'          =>  'required|string|unique:teams,name' . (@$this->team->id ? ',' . $this->team->id : null),
            'name_short'    =>  'required|string|unique:teams,name_short' . (@$this->team->id ? ',' . $this->team->id : null),
        ];
    }
}
