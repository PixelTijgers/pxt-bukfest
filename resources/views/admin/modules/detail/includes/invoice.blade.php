<h6 class="card-title mt-4">{{ __('Invoice') }}</h6>
<p class="mb-4 text-muted small">{{ __('Content Introduction Details Address') }}</p>

<x-form.input
    type="text"
    name="iv_name"
    :label="__('Name')"
    :value="(old('iv_name') ? old('iv_name') : (@$detail ? $detail->iv_name : null))"
    :row="true"
    :cols="['col-3', 'col-6']"
/>

<x-form.input
    type="text"
    name="iv_street"
    :label="__('Street')"
    :value="(old('iv_street') ? old('iv_street') : (@$detail ? $detail->iv_street : null))"
    :row="true"
    :cols="['col-3', 'col-6']"
/>

<x-form.input
    type="text"
    name="iv_zip_code"
    :label="__('Zip Code')"
    :value="(old('iv_zip_code') ? old('iv_zip_code') : (@$detail ? $detail->iv_zip_code : null))"
    :row="true"
    :cols="['col-3', 'col-6']"
/>

<x-form.input
    type="text"
    name="iv_location"
    :label="__('Location')"
    :value="(old('iv_location') ? old('iv_location') : (@$detail ? $detail->iv_location : null))"
    :row="true"
    :cols="['col-3', 'col-6']"
/>

<x-form.input
    type="text"
    name="iv_country"
    :label="__('Country')"
    :value="(old('iv_country') ? old('iv_country') : (@$detail ? $detail->iv_country : null))"
    :row="true"
    :cols="['col-3', 'col-6']"
/>
