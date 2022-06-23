<?php

// Controller namespacing.
namespace App\Http\Requests;

// Other.
use Illuminate\Foundation\Http\FormRequest;

class CalendarRequest extends FormRequest
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
            'title'             =>  'required|string|max:255|unique:calendar,title' . (@$this->calendar->id ? ',' . $this->calendar->id : null),
            'caption'           =>  'required|string|max:165',
            'content'           =>  'nullable|string',

            'meta_title'        =>  'required|string|max:255|unique:calendar,meta_title' . (@$this->calendar->id ? ',' . $this->calendar->id : null),
            'meta_description'  =>  'required|min:1|max:165',
            'meta_tags'         =>  'required|string|min:1',

            'og_title'          =>  'required|string|max:255|unique:calendar,og_title' . (@$this->calendar->id ? ',' . $this->calendar->id : null),,
            'og_description'    =>  'required|string|max:165',
            'og_slug'           =>  'sometimes|required|slug|unique:calendar,og_slug' . (@$this->calendar->id ? ',' . $this->calendar->id : null),
            'og_type'           =>  'required|string|max:21|in:website,article',
            'og_locale'         =>  'required|string|max:21',

            'visible'           =>  'nullable|boolean',
            'status'            =>  'required|string|in:archived,draft,published,unpublished',
            'published_at'      =>  'required|date_format:"Y-m-d H:i:s"',
            'unpublished_at'    =>  'nullable|after:published_at|date_format:"Y-m-d H:i:s"',
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        // Format unpublished at.
        $unpublished_at = ($this->unpublished_at !== null ? \Carbon\Carbon::createFromFormat('d-m-Y H:i', $this->unpublished_at)->toDateTimeString(): null);

        // Merge into request.
        $this->merge([
            'visible'           => ($this->visible !== null ? true : false),
            'published_at'      => \Carbon\Carbon::createFromFormat('d-m-Y H:i', $this->published_at)->toDateTimeString(),
            'unpublished_at'    => $unpublished_at,
        ]);
    }
}
