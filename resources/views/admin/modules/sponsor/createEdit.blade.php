@section('meta')
<title>{{ config('app.name') }} | {{ (@$sponsor ? __('Edit') . ' ' . \Str::Lower(__('Sponsor')) . ': ' . $sponsor->name  : __('Sponsor') . ' ' . \Str::Lower(__('Add'))) }}</title>
@endsection

<x-adminLayout>

    <div class="{{ $cssNs }}">

        @include('admin.layouts.breadcrumb', [
            'title' => __('Sponsor'),
            'description' => (@$post ? __('Sponsor Introduction Edit') : __('Sponsor Introduction Add')),
            'breadcrum' => [
                __('Sponsor') => route('sponsor.index'),
                (@$sponsor ? __('Edit') . ' ' . \Str::Lower(__('Sponsor')) . ': ' . $sponsor->name  : __('Sponsor') . ' ' . \Str::Lower(__('Add'))) => '#'
            ],
        ])

        @if ($errors->any())

            <div class="alert alert-fill-danger alert-dismissible fade show" role="alert">
                {{ __('Alert Error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
            </div>

        @endif

        <form class="form-content" method="post" action="{{ (@$sponsor ? route('sponsor.update', $sponsor) : route('sponsor.store')) }}" enctype="multipart/form-data">

            @csrf

            @if(@$sponsor)

            @method('PATCH')

            @endif

            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">

                            <h6 class="card-title mt-4">{{ __('Sponsor') }}</h6>
                            <p class="mb-4 text-muted small">{{ __('Content Introduction Sponsor') }}</p>

                            <div class="col-md-12">

                                <x-form.input
                                    type="text"
                                    name="name"
                                    :label="__('Name')"
                                    :value="(old('name') ? old('name') : (@$sponsor ? $sponsor->name : null))"
                                    :row="true"
                                    :cols="['col-2', 'col-10']"
                                />

                                <x-form.input
                                    type="text"
                                    name="url"
                                    :label="__('URL')"
                                    :value="(old('url') ? old('url') : (@$sponsor ? $sponsor->url : null))"
                                    :row="true"
                                    :cols="['col-2', 'col-10']"
                                />

                                <x-form.file
                                    name="sponsorImage"
                                    :label=" __('Image')"
                                    :file="(@$sponsor ? $sponsor->getFirstMediaUrl('sponsorImage') : null)"
                                    extensions="jpg jpeg png"
                                    :description="__('Image Description')"
                                />

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="form-submit">
                <button type="submit" class="btn btn-primary">{{ (@$sponsor ? __('Edit') : __('Add')) }}</button>
            </div>

        </form>

    </div>

</x-adminLayout>
