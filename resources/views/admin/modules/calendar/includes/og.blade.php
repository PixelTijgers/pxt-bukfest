<h6 class="card-title mt-4">{{ __('OG Tags') }}</h6>
<p class="mb-4 text-muted small">{{ __('OG Introduction') }}</p>

<div class="row">

    <div class="col-md-7">

        <x-form.input
            type="text"
            name="og_title"
            :label="'OG ' . __('Title')"
            :value="(old('og_title') ? old('og_title') : (@$calendar ? $calendar->og_title : null))"
        />

        <x-form.textarea
            name="og_description"
            maxLength="165"
            :description="__('OG Description')"
            :label="'OG ' . __('Description')"
            :value="(old('og_description') ? old('og_description') : (@$calendar ? $calendar->og_description : null))"
        />

        <x-form.slug
            name="og_slug"
            slugField="title"
            :label="'OG ' . __('Url')"
            :model="@$calendar"
            :modelName="\App\Models\Post::where('id', @$calendar->parent_id)->first()"
            :value="(old('og_slug') ? old('og_slug') : (@$calendar ? $calendar->og_slug : null))"
        />

    </div>

    <div class="col-md-4 offset-md-1">

        <x-form.select
            name="og_type"
            :label="'OG ' . __('Type')"
            :value="(old('og_type') ? old('og_type') : (@$calendar ? $calendar->og_type : null))"
            :options="[
               'website'   =>  __('Website'),
               'article'   =>  __('Article'),
            ]"
            :disabledOption="__('Type Select')"
        />

        <x-form.select
            name="og_locale"
            :label="'OG ' . __('Language')"
            :value="(old('og_locale') ? old('og_locale') : (@$calendar ? $calendar->og_locale : null))"
            :options="\App\Models\Locale::all()->sortBy('name')"
            :valueWrapper="['locale', 'name']"
            :disabledOption="__('Language Select')"
        />

        <x-form.file
            name="ogImage"
            :label="'OG ' . __('Image')"
            :file="(@$calendar ? $calendar->getFirstMediaUrl('ogImage') : null)"
            extensions="jpg jpeg png"
            :description="__('OG Image Description')"
            :required="false"
        />

    </div>

</div>
