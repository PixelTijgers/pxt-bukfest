@section('meta')
<title>{{ config('app.name') }} | {{ (@$post ? __('Edit') . ' ' . \Str::Lower(__('Post')) . ': ' . $post->title : __('Post') . ' ' . __('Add')) }}</title>
@endsection

<x-adminLayout>

    <div class="{{ $cssNs }}">

        @include('admin.layouts.breadcrumb', [
            'title' => __('Post'),
            'description' => (@$post ? __('Post Introduction Edit') : __('Post Introduction Add')),
            'breadcrum' => [
                __('Post') => route('post.index'),
                (@$post ? __('Edit') . ' ' . \Str::Lower(__('Post')) . ': ' . $post->title : __('Post') . ' ' . \Str::Lower(__('Add'))) => '#'
            ],
        ])
        
        @if ($errors->any())

            <div class="alert alert-fill-danger alert-dismissible fade show" role="alert">
                {{ __('Alert Error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
            </div>

        @endif

        <form class="form-content" method="post" action="{{ (@$post ? route('post.update', $post) : route('post.store')) }}" enctype="multipart/form-data">

            @csrf

            @if(@$post)

            @method('PATCH')

            @endif

            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">

                            <div class="col-md-12">

                                <ul class="nav nav-tabs nav-tabs-line" id="lineTab" role="tablist">

                                    <li class="nav-item">
                                        <a class="nav-link active" id="content-line-tab" data-bs-toggle="tab" data-bs-target="#content_tab" role="tab" aria-controls="content" aria-selected="true">{{ __('Content') }}</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="meta-line-tab" data-bs-toggle="tab" data-bs-target="#meta" role="tab" aria-controls="meta" aria-selected="true">{{ __('Meta') }}</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="og-line-tab" data-bs-toggle="tab" data-bs-target="#og" role="tab" aria-controls="og" aria-selected="true">{{ __('OG Tags') }}</a>
                                    </li>

                                </ul>

                                <div class="tab-content mt-3" id="lineTabContent">

                                    <div class="tab-pane fade show active" id="content_tab" role="tabpanel" aria-labelledby="content-line-tab">

                                        @include('admin.modules.post.includes.content')

                                    </div>

                                    <div class="tab-pane fade" id="meta" role="tabpanel" aria-labelledby="meta-line-tab">

                                        @include('admin.modules.post.includes.meta')

                                    </div>

                                    <div class="tab-pane fade" id="og" role="tabpanel" aria-labelledby="og-line-tab">

                                        @include('admin.modules.post.includes.og')

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="form-submit">
                <button type="submit" class="btn btn-primary">{{ (@$post ? __('Edit') : __('Add')) }}</button>
            </div>

        </form>

    </div>

</x-adminLayout>
