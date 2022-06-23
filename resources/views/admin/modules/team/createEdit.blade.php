@section('meta')
<title>{{ config('app.name') }} | {{ (@$team ? __('Edit') . ' ' . \Str::Lower(__('Team')) . ': ' . $team->name  : __('Team') . ' ' . \Str::Lower(__('Add'))) }}</title>
@endsection

<x-adminLayout>

    <div class="{{ $cssNs }}">

        @include('admin.layouts.breadcrumb', [
            'title' => __('Team'),
            'description' => (@$post ? __('Team Introduction Edit') : __('Team Introduction Add')),
            'breadcrum' => [
                __('Team') => route('team.index'),
                (@$team ? __('Edit') . ' ' . \Str::Lower(__('Team')) . ': ' . $team->name  : __('Team') . ' ' . \Str::Lower(__('Add'))) => '#'
            ],
        ])

        @if ($errors->any())

            <div class="alert alert-fill-danger alert-dismissible fade show" role="alert">
                {{ __('Alert Error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
            </div>

        @endif

        <form class="form-content" method="post" action="{{ (@$team ? route('team.update', $team) : route('team.store')) }}">

            @csrf

            @if(@$team)

            @method('PATCH')

            @endif

            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">

                            <h6 class="card-title mt-4">{{ __('Team') }}</h6>
                            <p class="mb-4 text-muted small">{{ __('Content Introduction Team') }}</p>

                            <div class="col-md-12">

                                <x-form.input
                                    type="text"
                                    name="name"
                                    :label="__('Teamname')"
                                    :value="(old('name') ? old('name') : (@$team ? $team->name : null))"
                                    :row="true"
                                    :cols="['col-2', 'col-10']"
                                />

                                <x-form.input
                                    type="text"
                                    name="name_short"
                                    :label="__('Teamname Short')"
                                    :value="(old('name_short') ? old('name_short') : (@$team ? $team->name_short : null))"
                                    :row="true"
                                    :cols="['col-2', 'col-10']"
                                />

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="form-submit">
                <button type="submit" class="btn btn-primary">{{ (@$team ? __('Edit') : __('Add')) }}</button>
            </div>

        </form>

    </div>

</x-adminLayout>
