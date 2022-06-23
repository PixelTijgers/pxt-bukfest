@section('meta')
<title>{{ config('app.name') }} | {{ (@$member ? __('Edit') . ' ' . \Str::Lower(__('Member')) . ': ' . $member->name  : __('Member') . ' ' . \Str::Lower(__('Add'))) }}</title>
@endsection

<x-adminLayout>

    <div class="{{ $cssNs }}">

        @include('admin.layouts.breadcrumb', [
            'title' => __('Member'),
            'description' => (@$member ? __('Member Introduction Edit') : __('Member Introduction Add')),
            'breadcrum' => [
                __('Member') => route('member.index'),
                (@$member ? __('Edit') . ' ' . \Str::Lower(__('Member')) . ': ' . $member->name  : __('Member') . ' ' . \Str::Lower(__('Add'))) => '#'
            ],
        ])

        @if ($errors->any())

            <div class="alert alert-fill-danger alert-dismissible fade show" role="alert">
                {{ __('Alert Error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
            </div>

        @endif

        <form class="form-content" method="post" action="{{ (@$member ? route('member.update', $member) : route('member.store')) }}">

            @csrf

            @if(@$member)

            @method('PATCH')

            @endif

            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">

                            <h6 class="card-title mt-4">{{ __('Member') }}</h6>
                            <p class="mb-4 text-muted small">{{ __('Content Introduction Member') }}</p>

                            <div class="col-md-12">

                                <x-form.select
                                    name="team_id"
                                    :label="__('Team')"
                                    :row="true"
                                    :cols="['col-2', 'col-3']"
                                    :value="(old('team_id') ? old('team_id') : (@$member ? $member->team_id : null))"
                                    :options="\App\Models\Team::all()->sortBy('name')"
                                    :valueWrapper="['id', 'name']"
                                    :disabledOption="__('Team Select')"
                                />

                                <x-form.select
                                    name="membership_id"
                                    :label="__('Membership')"
                                    :row="true"
                                    :cols="['col-2', 'col-3']"
                                    :value="(old('membership_id') ? old('membership_id') : (@$member ? $member->membership_id : null))"
                                    :options="\App\Models\Membership::all()->sortBy('name')"
                                    :valueWrapper="['id', 'name']"
                                    :disabledOption="__('Membership Select')"
                                />

                                <x-form.input
                                    type="text"
                                    name="name"
                                    :label="__('Name')"
                                    :value="(old('name') ? old('name') : (@$member ? $member->name : null))"
                                    :row="true"
                                    :cols="['col-2', 'col-6']"
                                />

                                <x-form.date
                                    name="birthday"
                                    :label="__('Birthday')"
                                    :value="(old('birthday') ? old('birthday') : (@$member ? $member->birthday : null))"
                                    :row="true"
                                    :cols="['col-2', 'col-3']"
                                />

                                <x-form.input
                                    type="email"
                                    name="email"
                                    :label="__('Email')"
                                    :value="(old('email') ? old('email') : (@$member ? $member->email : null))"
                                    :row="true"
                                    :cols="['col-2', 'col-6']"
                                />

                                <x-form.input
                                    type="text"
                                    name="phone"
                                    :label="__('Phone')"
                                    :value="(old('phone') ? old('phone') : (@$member ? $member->phone : null))"
                                    :required="false"
                                    :row="true"
                                    :cols="['col-2', 'col-6']"
                                />

                                <x-form.input
                                    type="text"
                                    name="mobile"
                                    :label="__('Mobile')"
                                    :value="(old('mobile') ? old('mobile') : (@$member ? $member->mobile : null))"
                                    :required="false"
                                    :row="true"
                                    :cols="['col-2', 'col-6']"
                                />

                                <x-form.input
                                    type="text"
                                    name="street"
                                    :label="__('Street')"
                                    :value="(old('street') ? old('street') : (@$member ? $member->street : null))"
                                    :row="true"
                                    :cols="['col-2', 'col-6']"
                                />

                                <x-form.input
                                    type="text"
                                    name="zip_code"
                                    :label="__('Zip Code')"
                                    :value="(old('zip_code') ? old('zip_code') : (@$member ? $member->zip_code : null))"
                                    :row="true"
                                    :cols="['col-2', 'col-2']"
                                />

                                <x-form.input
                                    type="text"
                                    name="location"
                                    :label="__('Location')"
                                    :value="(old('location') ? old('location') : (@$member ? $member->location : null))"
                                    :row="true"
                                    :cols="['col-2', 'col-6']"
                                />

                                <x-form.input
                                    type="text"
                                    name="country"
                                    :label="__('Country')"
                                    :value="(old('country') ? old('country') : (@$member ? $member->country : null))"
                                    :row="true"
                                    :cols="['col-2', 'col-6']"
                                />

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="form-submit">
                <button type="submit" class="btn btn-primary">{{ (@$member ? __('Edit') : __('Add')) }}</button>
            </div>

        </form>

    </div>

</x-adminLayout>
