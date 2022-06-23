<h6 class="card-title mt-4">{{ __('Meta') }}</h6>
<p class="mb-4 text-muted small">{{ __('Meta Introduction') }}</p>

<x-form.input
    type="text"
    name="meta_title"
    :label="'Meta ' . __('Title')"
    :cols="['col-2','col-10']"
    :value="(old('meta_title') ? old('meta_title') : (@$page ? $page->meta_title : null))"
/>

<x-form.textarea
    name="meta_description"
    maxLength="165"
    :description="__('Meta Description')"
    :label="'Meta ' . __('Description')"
    :value="(old('meta_description') ? old('meta_description') : (@$page ? $page->meta_description : null))"
/>

<x-form.tag
    name="meta_tags"
    :label="'Meta ' . __('Tags')"
    :cols="['col-2','col-10']"
    :value="(old('meta_tags') ? old('meta_tags') : (@$page ? $page->meta_tags : null))"
/>
