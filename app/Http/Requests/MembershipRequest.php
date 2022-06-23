<?php

// Controller namespacing.
namespace App\Http\Requests;

// Other.
use Illuminate\Foundation\Http\FormRequest;

class MembershipRequest extends FormRequest
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
            'name'                      => 'required|string|max:255|unique:memberships,name'  . (@$this->membership->id ? ',' . $this->membership->id : null),
            'contribution'              => 'required|numeric|between:0,9999.999',
            'contribution_first_half'   => 'required|numeric|between:0,9999.999',
            'contribution_second_half'  => 'required|numeric|between:0,9999.999',
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

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        // Merge into request.
        $this->merge([
            'contribution'              => number_format((float) $this->contribution, 3),
            'contribution_first_half'   => number_format((float) $this->contribution_first_half, 3),
            'contribution_second_half'  => number_format((float) $this->contribution_second_half, 3)
        ]);
    }
}
