@section('meta')
<title>{{ config('app.name') }} | {{ (@$client ? __('Edit') . ' ' . \Str::Lower(__('Client')) . ': ' . $client->name  : __('Client') . ' ' . \Str::Lower(__('Add'))) }}</title>
    <meta name="description" content="{{ (@$client ? __('Client Edit') : __('Client Add')) }}" />
@endsection

<x-adminLayout>

    <div class="{{ $cssNs }}">

        @include('admin.layouts.breadcrumb', [
            'title' => __('Clients'),
            'description' => (@$client ? __('Edit') . ' ' . \Str::Lower(__('Client')) . ': ' . $client->name  : __('Client Add')),
            'breadcrum' => [
                __('Clients') => route('client.index'),
                (@$client ? __('Edit') . ' ' . \Str::Lower(__('Client')) . ': ' . $client->name  : __('Client') . ' ' . \Str::Lower(__('Add'))) => '#'
            ],
        ])

        @if ($errors->any())

            <div class="alert alert-fill-danger alert-dismissible fade show" role="alert">
                {{ __('Alert Error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
            </div>

        @endif

        <form class="form-content" method="post" action="{{ (@$client ? route('client.update', $client) : route('client.store')) }}" enctype="multipart/form-data">

            @csrf

            @if(@$client)

            @method('PATCH')

            @endif

            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">

                            <h6 class="card-title mt-4">{{ __('Clients') }}</h6>
                            <p class="mb-4 text-muted small">{{ __('Content Introduction Clients') }}</p>

                            <x-form.input
                                type="text"
                                name="name"
                                :label="__('Company')"
                                :value="(old('name') ? old('name') : (@$client ? $client->name : null))"
                                :row="true"
                                :cols="['col-3', 'col-6']"
                            />

                            <x-form.input
                                type="text"
                                name="contact"
                                :label="__('Contactperson')"
                                :value="(old('contact') ? old('contact') : (@$client ? $client->contact : null))"
                                :row="true"
                                :cols="['col-3', 'col-6']"
                            />

                            <x-form.input
                                type="text"
                                name="street"
                                :label="__('Street')"
                                :value="(old('street') ? old('street') : (@$client ? $client->street : null))"
                                :row="true"
                                :cols="['col-3', 'col-6']"
                            />

                            <x-form.input
                                type="text"
                                name="zip_code"
                                :label="__('Zip Code')"
                                :value="(old('zip_code') ? old('zip_code') : (@$client ? $client->zip_code : null))"
                                :row="true"
                                :cols="['col-3', 'col-2']"
                            />

                            <x-form.input
                                type="text"
                                name="location"
                                :label="__('Location')"
                                :value="(old('location') ? old('location') : (@$client ? $client->location : null))"
                                :row="true"
                                :cols="['col-3', 'col-6']"
                            />

                            <x-form.input
                                type="text"
                                name="country"
                                :label="__('Country')"
                                :value="(old('country') ? old('country') : (@$client ? $client->country : null))"
                                :row="true"
                                :cols="['col-3', 'col-6']"
                            />

                            <x-form.input
                                type="email"
                                name="email"
                                :label="__('Email')"
                                :value="(old('email') ? old('email') : (@$client ? $client->email : null))"
                                :row="true"
                                :cols="['col-3', 'col-6']"
                            />

                            <x-form.input
                                type="text"
                                name="phone"
                                :label="__('Phone')"
                                :value="(old('phone') ? old('phone') : (@$client ? $client->phone : null))"
                                :required="false"
                                :row="true"
                                :cols="['col-3', 'col-6']"
                            />

                            <x-form.input
                                type="text"
                                name="mobile"
                                :label="__('Mobile')"
                                :value="(old('mobile') ? old('mobile') : (@$client ? $client->mobile : null))"
                                :row="true"
                                :cols="['col-3', 'col-6']"
                            />

                            <x-form.input
                                type="text"
                                name="vat"
                                :label="__('VAT')"
                                :value="(old('vat') ? old('vat') : (@$client ? $client->vat : null))"
                                :row="true"
                                :cols="['col-3', 'col-6']"
                            />

                            <x-form.file
                                name="clientImage"
                                :label="__('Image')"
                                :file="(@$client ? $client->getFirstMediaUrl('clientImage') : null)"
                                extensions="jpg jpeg png"
                                :required="false"
                            />

                        </div>

                    </div>

                </div>

            </div>

            <div class="form-submit">
                <button type="submit" class="btn btn-primary">{{ (@$client ? __('Edit') : __('Add')) }}</button>
            </div>

        </form>

    </div>

</x-adminLayout>
