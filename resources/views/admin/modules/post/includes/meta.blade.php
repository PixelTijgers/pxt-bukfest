<h6 class="card-title mt-4">{{ __('Meta') }}</h6>
<p class="mb-4 text-muted small">{{ __('Meta Description') }}</p>

<x-form.input
    type="text"
    name="meta_title"
    :label="'Meta ' . __('Title')"
    :cols="['col-2','col-10']"
    :value="(old('meta_title') ? old('meta_title') : (@$post ? $post->meta_title : null))"
/>

<x-form.textarea
    name="meta_description"
    maxLength="165"
    :description="__('Meta Description 2')"
    :label="'Meta ' . __('Description')"
    :value="(old('meta_description') ? old('meta_description') : (@$post ? $post->meta_description : null))"
/>

<x-form.tag
    name="meta_tags"
    :label="'Meta ' . __('Tags')"
    :cols="['col-2','col-10']"
    :value="(old('meta_tags') ? old('meta_tags') : (@$post ? $post->meta_tags : null))"
/>
