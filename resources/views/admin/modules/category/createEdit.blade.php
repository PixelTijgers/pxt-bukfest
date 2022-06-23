@section('meta')
<title>{{ config('app.name') }} | {{ (@$category ? __('Edit') . ' ' . \Str::Lower(__('Category')) . ': ' . $category->name  : __('Category') . ' ' . \Str::Lower(__('Add'))) }}</title>
@endsection

<x-adminLayout>

    <div class="{{ $cssNs }}">

        @include('admin.layouts.breadcrumb', [
            'title' => __('Category'),
            'description' => (@$post ? __('Category Introduction Edit') : __('Category Introduction Add')),
            'breadcrum' => [
                __('Category') => route('category.index'),
                (@$category ? __('Edit') . ' ' . \Str::Lower(__('Category')) . ': ' . $category->name  : __('Category') . ' ' . \Str::Lower(__('Add'))) => '#'
            ],
        ])

        @if ($errors->any())

            <div class="alert alert-fill-danger alert-dismissible fade show" role="alert">
                {{ __('Alert Error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
            </div>

        @endif

        <form class="form-content" method="post" action="{{ (@$category ? route('category.update', $category) : route('category.store')) }}">

            @csrf

            @if(@$category)

            @method('PATCH')

            @endif

            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">

                            <h6 class="card-title mt-4">{{ __('Category') }}</h6>
                            <p class="mb-4 text-muted small">{{ __('Content Introduction Category') }}</p>

                            <div class="col-md-12">

                                <x-form.input
                                    type="text"
                                    name="name"
                                    :label="__('Name')"
                                    :value="(old('name') ? old('name') : (@$category ? $category->name : null))"
                                    :row="true"
                                    :cols="['col-2', 'col-10']"
                                />

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="form-submit">
                <button type="submit" class="btn btn-primary">{{ (@$category ? __('Edit') : __('Add')) }}</button>
            </div>

        </form>

    </div>

</x-adminLayout>
