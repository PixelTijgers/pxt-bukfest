<x-form.input
    type="text"
    name="name"
    :label="__('Name')"
    :required="true"
    :value="(old('name') ? old('name') : (@$administrator ? $administrator->name : null))"
/>

<x-form.input
    type="email"
    name="email"
    :label="__('Email')"
    :required="true"
    :value="(old('email') ? old('email') : (@$administrator ? $administrator->email : null))"
/>

<x-form.input
    type="text"
    name="phone"
    :label="__('Phone')"
    :required="true"
    :value="(old('phone') ? old('phone') : (@$administrator ? $administrator->phone : null))"
/>

<h6 class="card-title mt-5">{{ __('Edit') }} {{ __('Password') }}</h6>
<p class="card-description small text-muted mb-3">{{ __('Password Description Edit') }}</p>

<x-form.input
    type="password"
    name="password"
    :label="__('Password')"
    :required="false"
/>

<x-form.input
    type="password"
    name="password_confirmation"
    :label="__('Password Repeat')"
    :required="false"
/>
