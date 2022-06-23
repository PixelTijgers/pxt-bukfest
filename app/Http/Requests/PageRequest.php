<?php

// Controller namespacing.
namespace App\Http\Requests;

// Other.
use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
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
            'page_title'        =>  'required|string|max:255|unique:pages,page_title' . (@$this->page->id ? ',' . $this->page->id : null),
            'menu_title'        =>  'required|string|max:255|unique:pages,menu_title' . (@$this->page->id ? ',' . $this->page->id : null),
            'slug'              =>  'sometimes|required|max:255|slug|unique:pages,slug' . (@$this->page->id ? ',' . $this->page->id : null),
            'caption'           =>  'required',
            'content'           =>  'required',

            'meta_title'        =>  'required|string|max:255|unique:pages,meta_title' . (@$this->page->id ? ',' . $this->page->id : null),
            'meta_description'  =>  'required|string|max:165',
            'meta_tags'         =>  'required|string',

            'og_title'          =>  'required|string|max:255',
            'og_description'    =>  'required|string|max:165',
            'og_slug'           =>  'sometimes|max:255|required|slug|unique:pages,og_slug' . (@$this->page->id ? ',' . $this->page->id : null),
            'og_type'           =>  'required|string|max:21|in:website,article',
            'og_locale'         =>  'required|string|max:21',

            'status'            =>  'required|string|in:archived,draft,published,unpublished',
            'published_at'      =>  'required|date_format:"Y-m-d H:i:s"',
            'unpublished_at'    =>  'nullable|after:published_at|date_format:"Y-m-d H:i:s"',

            'visible_in_menu'   =>  'required|boolean',
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
            'visible_in_menu'   => ($this->visible_in_menu !== null ? true : false),
            'published_at'      => \Carbon\Carbon::createFromFormat('d-m-Y H:i', $this->published_at)->toDateTimeString(),
            'unpublished_at'    => $unpublished_at,
        ]);
    }
}
