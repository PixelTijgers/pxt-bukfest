<h6 class="card-title mt-4">{{ __('Content') }}</h6>
<p class="mb-4 text-muted small">{{ __('Content Introduction Post') }}</p>

<div class="row">

    <div class="col-md-8">

        <x-form.input
            type="text"
            name="title"
            :label="__('Title')"
            :value="(old('title') ? old('title') : (@$post ? $post->title : null))"
        />

        <x-form.textarea
            name="caption"
            maxLength="165"
            :description="__('Caption Description')"
            :label="__('Caption')"
            :value="(old('caption') ? old('caption') : (@$post ? $post->caption : null))"
        />

        <x-form.rich-text
            name="content"
            :label="__('Content')"
            :value="(old('content') ? old('content') : (@$post ? $post->content : __('CKEditor Onload')))"
        />

        <x-form.slug
            name="slug"
            slugField="title"
            :description="__('Url Description')"
            :label="__('Url')"
            :model="@$post"
            :modelName="\App\Models\Post::where('id', @$post->parent_id)->first()"
            :value="(old('slug') ? old('slug') : (@$post ? $post->slug : null))"
        />

    </div>

    <div class="col-md-3 offset-md-1">

        <x-form.file
            extensions="jpg jpeg png"
            name="postImage"
            :label="__('Image')"
            :file="(@$post ? $post->getFirstMediaUrl('postImage') : null)"
            :description="__('Image Description')"
            :required="false"
        />

        <x-form.select
            name="category_id"
            :label="__('Category')"
            :cols="['col-3', 'col-4']"
            :value="(old('category_id') ? old('category_id') : (@$post ? $post->category_id : null))"
            :options="\App\Models\Category::all()->sortBy('name')"
            :valueWrapper="['id', 'name']"
            :disabledOption="__('Category Select')"
        />

        <x-form.select
            name="administrator_id"
            :label="__('Author')"
            :cols="['col-3', 'col-4']"
            :value="(old('administrator_id') ? old('administrator_id') : (@$post ? $post->administrator_id : null))"
            :options="\App\Models\Administrator::all()->sortBy('name')"
            :valueWrapper="['id', 'name']"
            :disabledOption="__('Author Select')"
        />

        <x-form.date-time
            name="published_at"
            :label="__('Published At')"
            :value="(old('published_at') ? old('published_at') : (@$post ? $post->published_at : null))"
            :description="__('Published At Description')"
        />

        <x-form.date-time
            name="unpublished_at"
            :label="__('Unpublished At')"
            :value="(old('unpublished_at') ? old('unpublished_at') : (@$post ? $post->unpublished_at : null))"
            :description="__('Unpublished At Description')"
            :required="false"
        />

        <x-form.select
            name="status"
            :label="__('Status')"
            :cols="['col-3', 'col-4']"
            :value="(old('status') ? old('status') : (@$post ? $post->status : null))"
            :options="[
               'archived' =>  __('Select Archived'),
               'draft' =>  __('Select Draft'),
               'published' => __('Select Published'),
               'unpublished'   =>  __('Select Unpublished')
            ]"
            :disabledOption="__('Select Status')"
        />

    </div>

</div>
