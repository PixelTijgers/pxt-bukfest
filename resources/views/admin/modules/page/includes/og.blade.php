<h6 class="card-title mt-4">{{ __('OG Tags') }}</h6>
<p class="mb-4 text-muted small">{{ __('OG Introduction') }}</p>

<div class="row">

    <div class="col-md-7">

        <x-form.input
            type="text"
            name="og_title"
            :label="'OG ' . __('Title')"
            :value="(old('og_title') ? old('og_title') : (@$page ? $page->og_title : null))"
        />

        <x-form.textarea
            name="og_description"
            maxLength="165"
            :description="__('OG Description')"
            :label="'OG ' . __('Description')"
            :value="(old('og_description') ? old('og_description') : (@$page ? $page->og_description : null))"
        />

        @if(@$page->id !== 1)
        <x-form.slug
            name="og_slug"
            slugField="page_title"
            :label="'OG ' . __('Url')"
            :model="@$page"
            :modelName="\App\Models\Post::where('id', @$page->parent_id)->first()"
            :value="(old('og_slug') ? old('og_slug') : (@$page ? $page->og_slug : null))"
        />
        @endif

    </div>

    <div class="col-md-4 offset-md-1">

        <x-form.file
            name="ogImage"
            :label="'OG ' . __('Image')"
            :file="(@$page ? $page->getFirstMediaUrl('ogImage') : null)"
            extensions="jpg jpeg png"
            :description="__('OG Image Description')"
            :required="false"
        />

        <x-form.select
            name="og_type"
            :label="'OG ' . __('Type')"
            :value="(old('og_type') ? old('og_type') : (@$page ? $page->og_type : null))"
            :options="[
               'website'   =>  __('Website'),
               'article'   =>  __('Article'),
            ]"
            :disabledOption="__('Type Select')"
        />

        <x-form.select
            name="og_locale"
            :label="'OG ' . __('Language')"
            :value="(old('og_locale') ? old('og_locale') : (@$page ? $page->og_locale : null))"
            :options="\App\Models\Locale::all()->sortBy('name')"
            :valueWrapper="['locale', 'name']"
            :disabledOption="__('Language Select')"
        />

    </div>

</div>
