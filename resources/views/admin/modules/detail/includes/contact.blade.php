<h6 class="card-title mt-4">{{ __('Contact') }}</h6>
<p class="mb-4 text-muted small">{{ __('Content Introduction Details') }}</p>

<x-form.input
    type="text"
    name="name"
    :label="__('Company')"
    :value="(old('name') ? old('name') : (@$detail ? $detail->name : null))"
    :row="true"
    :cols="['col-3', 'col-6']"
/>

<x-form.input
    type="text"
    name="contact"
    :label="__('Contactperson')"
    :value="(old('contact') ? old('contact') : (@$detail ? $detail->contact : null))"
    :row="true"
    :cols="['col-3', 'col-6']"
/>

<x-form.input
    type="text"
    name="street"
    :label="__('Street')"
    :value="(old('street') ? old('street') : (@$detail ? $detail->street : null))"
    :row="true"
    :cols="['col-3', 'col-6']"
/>

<x-form.input
    type="text"
    name="zip_code"
    :label="__('Zip Code')"
    :value="(old('zip_code') ? old('zip_code') : (@$detail ? $detail->zip_code : null))"
    :row="true"
    :cols="['col-3', 'col-2']"
/>

<x-form.input
    type="text"
    name="location"
    :label="__('Location')"
    :value="(old('location') ? old('location') : (@$detail ? $detail->location : null))"
    :row="true"
    :cols="['col-3', 'col-6']"
/>

<x-form.input
    type="text"
    name="country"
    :label="__('Country')"
    :value="(old('country') ? old('country') : (@$detail ? $detail->country : null))"
    :row="true"
    :cols="['col-3', 'col-6']"
/>

<x-form.input
    type="email"
    name="email"
    :label="__('Email')"
    :value="(old('email') ? old('email') : (@$detail ? $detail->email : null))"
    :row="true"
    :cols="['col-3', 'col-6']"
/>

<x-form.input
    type="text"
    name="phone"
    :label="__('Phone')"
    :value="(old('phone') ? old('phone') : (@$detail ? $detail->phone : null))"
    :required="false"
    :row="true"
    :cols="['col-3', 'col-6']"
/>

<x-form.input
    type="text"
    name="mobile"
    :label="__('Mobile')"
    :value="(old('mobile') ? old('mobile') : (@$detail ? $detail->mobile : null))"
    :row="true"
    :cols="['col-3', 'col-6']"
/>

<x-form.input
    type="text"
    name="coc"
    :label="__('COC')"
    :value="(old('coc') ? old('coc') : (@$detail ? $detail->coc : null))"
    :row="true"
    :cols="['col-3', 'col-6']"
/>

<x-form.input
    type="text"
    name="vat"
    :label="__('VAT')"
    :value="(old('vat') ? old('vat') : (@$detail ? $detail->vat : null))"
    :row="true"
    :cols="['col-3', 'col-6']"
/>

<x-form.input
    type="text"
    name="bank"
    :label="__('Bank')"
    :value="(old('bank') ? old('bank') : (@$detail ? $detail->bank : null))"
    :row="true"
    :cols="['col-3', 'col-6']"
/>
