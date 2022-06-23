@role('superadmin')
<div class="admin-permissions-switcher">

    <x-form.radio
        name="role"
        :label="__('Usertype')"
        :value="(@$administrator ? \Arr::first($administrator->roles->pluck('name')->toArray()) : null)"
        :options="[
            'superadmin'    => __('Superadmin'),
            'administrator' => __('Administrator'),
            'editor'        => __('Editor'),
            'user'          => __('User'),
        ]"
    />

</div>

@endrole

<x-form.file
    name="avatar"
    extensions="jpg jpeg png"
    :label="__('Image')"
    :file="(@$administrator ? $administrator->getFirstMediaUrl('avatar') : null)"
    :description="__('Image Description')"
    :required="false"
/>
