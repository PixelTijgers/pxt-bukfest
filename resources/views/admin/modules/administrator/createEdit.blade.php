@section('meta')
<title>{{ config('app.name') }} | {{ (@$administrator ? __('Edit') . ' ' . \Str::Lower(__('User')) . ': ' . $administrator->name : __('User') . ' ' . \Str::Lower(__('Add'))) }}</title>
    <meta name="description" content="{{ (@$administrator ? __('Users Edit') : __('Users Add')) }}" />
@endsection

<x-adminLayout>

    <div class="{{ $cssNs }}">

                    @include('admin.layouts.breadcrumb', [
                        'title' => __('Users'),
                        'description' => (@$post ? __('Users Introduction Edit') : __('Users Introduction Add')),
                        'breadcrum' => [
                            __('Users') => route('administrator.index'),
                            (@$administrator ? __('Edit') . ' ' . \Str::Lower(__('User')) . ': ' . $administrator->name : __('User') . ' ' . \Str::Lower(__('Add'))) => '#'
                        ],
                    ])

                    @if(session('type'))

                        <div class="alert alert-fill-{{ session('type') }} alert-dismissible fade show" role="alert">
                            {{ session('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
                        </div>

                    @elseif ($errors->any())

                        <div class="alert alert-fill-danger alert-dismissible fade show" role="alert">
                            {{ __('Alert Error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
                        </div>

                    @endif

                    <form class="form-content" method="post" action="{{ (@$administrator ? route('administrator.update', $administrator) : route('administrator.store')) }}" enctype="multipart/form-data">

                        @csrf

                        @if(@$administrator)

                        @method('PATCH')

                        @endif

                        <div class="row">

                            <div class="col-md-12 grid-margin stretch-card">

                                <div class="card">

                                    <div class="card-body">

                                        <div class="row">

                                            <div class="col-md-12">

                                                <h6 class="card-title">{{ __('General') }}</h6>
                                                <p class="text-muted mb-4">{{ __('Users Introduction Edit Description') }}</p>

                                            </div>

                                            <div class="col-md-7 grid-margin">

                                                @include('admin.modules.administrator.includes.profile')

                                            </div>

                                            <div class="col-md-4 offset-1 grid-margin">

                                                @include('admin.modules.administrator.includes.user')

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        @include('admin.modules.administrator.includes.permissions')

                        <div class="form-submit">
                            <button type="submit" class="btn btn-primary">{{ (@$administrator ? __('Edit') : __('Add')) }}</button>
                        </div>

                    </form>

                </div>

</x-adminLayout>
