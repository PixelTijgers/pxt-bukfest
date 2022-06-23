@section('meta')
<title>{{ config('app.name') }} | {{ (@$membership ? __('Edit') . ' ' . \Str::Lower(__('Membership')) . ': ' . $membership->name  : __('Membership') . ' ' . \Str::Lower(__('Add'))) }}</title>
@endsection

<x-adminLayout>

    <div class="{{ $cssNs }}">

        @include('admin.layouts.breadcrumb', [
            'title' => __('Membership'),
            'description' => (@$post ? __('Membership Introduction Edit') : __('Membership Introduction Add')),
            'breadcrum' => [
                __('Membership') => route('membership.index'),
                (@$membership ? __('Edit') . ' ' . \Str::Lower(__('Membership')) . ': ' . $membership->name  : __('Membership') . ' ' . \Str::Lower(__('Add'))) => '#'
            ],
        ])

        @if ($errors->any())

            <div class="alert alert-fill-danger alert-dismissible fade show" role="alert">
                {{ __('Alert Error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
            </div>

        @endif

        <form class="form-content" method="post" action="{{ (@$membership ? route('membership.update', $membership) : route('membership.store')) }}">

            @csrf

            @if(@$membership)

            @method('PATCH')

            @endif

            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">

                            <h6 class="card-title mt-4">{{ __('Membership') }}</h6>
                            <p class="mb-4 text-muted small">{{ __('Content Introduction Membership') }}</p>

                            <div class="col-md-12">

                                <x-form.input
                                    type="text"
                                    name="name"
                                    :label="__('Name')"
                                    :value="(old('name') ? old('name') : (@$membership ? $membership->name : null))"
                                    :row="true"
                                    :cols="['col-3', 'col-6']"
                                />

                                <x-form.input
                                    type="text"
                                    name="contribution"
                                    :label="__('Contribution')"
                                    :value="(old('contribution') ? old('contribution') : (@$membership ? number_format($membership->contribution, 2, ',', '.') : null))"
                                    :row="true"
                                    :cols="['col-3', 'col-2']"
                                />

                                <x-form.input
                                    type="text"
                                    name="contribution_first_half"
                                    :label="__('Contribution First Half')"
                                    :value="(old('contribution_first_half') ? old('contribution_first_half') : (@$membership ? number_format($membership->contribution_first_half, 2, ',', '.') : null))"
                                    :row="true"
                                    :cols="['col-3', 'col-2']"
                                />

                                <x-form.input
                                    type="text"
                                    name="contribution_second_half"
                                    :label="__('Contribution Second Half')"
                                    :value="(old('contribution_second_half') ? old('contribution_second_half') : (@$membership ? number_format($membership->contribution_second_half, 2, ',', '.') : null))"
                                    :row="true"
                                    :cols="['col-3', 'col-2']"
                                />

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="form-submit">
                <button type="submit" class="btn btn-primary">{{ (@$membership ? __('Edit') : __('Add')) }}</button>
            </div>

        </form>

    </div>

</x-adminLayout>
