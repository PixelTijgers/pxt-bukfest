@section('meta')
<title>{{ config('app.name') }} | {{ (@$social ? __('Edit') . ' ' . \Str::Lower(__('Social Media')) . ': ' . $social->socialmedia->name : __('Social Media') . ' ' . \Str::Lower(__('Add'))) }}</title>
@endsection

<x-adminLayout>

    <div class="{{ $cssNs }}">

        @include('admin.layouts.breadcrumb', [
            'title' => __('Social Media'),
            'description' => (@$post ? __('Category Introduction Edit') : __('Category Introduction Add')),
            'breadcrum' => [
                __('Social Media') => route('social.index'),
                (@$social ? __('Edit') . ' ' . \Str::Lower(__('Social Media')) . ': ' . $social->socialmedia->name : __('Social Media') . ' ' . \Str::Lower(__('Add'))) => '#'
            ],
        ])

        @if ($errors->any())

            <div class="alert alert-fill-danger alert-dismissible fade show" role="alert">
                {{ __('Alert Error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
            </div>

        @endif

        <form class="form-content" method="post" action="{{ (@$social ? route('social.update', $social) : route('social.store')) }}">

            @csrf

            @if(@$social)

            @method('PATCH')

            @endif

            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">

                            <h6 class="card-title mt-4">{{ __('Social Media') }}</h6>
                            <p class="mb-4 text-muted small">{{ __('Content Introduction Social Media') }}</p>

                            <div class="col-md-12">

                                <x-form.input
                                    type="text"
                                    name="content"
                                    :label="__('Url')"
                                    :value="(old('content') ? old('content') : (@$social ? $social->content : null))"
                                    :row="true"
                                    :cols="['col-2', 'col-10']"
                                />

                                <x-form.select
                                    name="social_media_id"
                                    :required="true"
                                    :label="__('Social Media')"
                                    :value="(old('social_media_id') ? old('social_media_id') : (@$social ? $social->social_media_id : null))"
                                    :options="\App\Models\SocialMedia::all()->sortBy('type')"
                                    :valueWrapper="['id', 'name']"
                                    :disabledOption="__('Category Social Media')"
                                    :row="true"
                                    :cols="['col-2', 'col-4']"
                                />

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="form-submit">
                <button type="submit" class="btn btn-primary">{{ (@$social ? __('Edit') : __('Add')) }}</button>
            </div>

        </form>

    </div>

</x-adminLayout>
