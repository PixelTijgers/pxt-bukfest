<h6 class="card-title mt-4">{{ __('Content') }}</h6>
<p class="mb-4 text-muted small">{{ __('Content Introduction Post') }}</p>

<div class="row">

    <div class="col-md-8">

        <x-form.input
            type="text"
            name="title"
            :label="__('Title')"
            :value="(old('title') ? old('title') : (@$calendar ? $calendar->title : null))"
        />

        <x-form.textarea
            name="caption"
            maxLength="165"
            :description="__('Caption Description')"
            :label="__('Caption')"
            :value="(old('caption') ? old('caption') : (@$calendar ? $calendar->caption : null))"
        />

        <x-form.rich-text
            name="content"
            :label="__('Content')"
            :value="(old('content') ? old('content') : (@$calendar ? $calendar->content : __('CKEditor Onload')))"
        />

    </div>

    <div class="col-md-3 offset-md-1">

        <x-form.file
            extensions="jpg jpeg png"
            name="postImage"
            :label="__('Image')"
            :file="(@$calendar ? $calendar->getFirstMediaUrl('postImage') : null)"
            :description="__('Image Description')"
            :required="false"
        />

        <x-form.date-time
            name="published_at"
            :label="__('Activity Date')"
            :value="(old('published_at') ? old('published_at') : (@$calendar ? $calendar->published_at : null))"
        />

        <x-form.date-time
            name="unpublished_at"
            :label="__('Activity Date End')"
            :value="(old('unpublished_at') ? old('unpublished_at') : (@$calendar ? $calendar->unpublished_at : null))"
            :required="false"
        />

        <x-form.select
            name="status"
            :label="__('Status')"
            :cols="['col-3', 'col-4']"
            :value="(old('status') ? old('status') : (@$calendar ? $calendar->status : null))"
            :options="[
               'archived' =>  __('Select Archived'),
               'draft' =>  __('Select Draft'),
               'published' => __('Select Published'),
               'unpublished'   =>  __('Select Unpublished')
            ]"
            :disabledOption="__('Select Status')"
        />

        <x-form.switcher
            name="visible"
            :label="__('Visible As Article')"
            :value="(old('visible') ? old('visible') : (@$calendar ? $calendar->visible : null))"
            :required="false"
        />

    </div>

</div>
