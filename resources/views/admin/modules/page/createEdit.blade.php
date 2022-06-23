@section('meta')
<title>{{ config('app.name') }} | {{ (@$page ? __('Edit') . ' ' . \Str::Lower(__('Page')) . ': ' . $page->page_title : __('Page') . ' ' . __('Add')) }}</title>
@endsection

@push('styles')
<link href="{{ URL::asset('plugins/jquery-ui-dist/jquery-ui.min.css') }}" rel="stylesheet" />
@endpush

@push('js')
<script src="{{ URL::asset('plugins/jquery-ui-dist/jquery-ui.min.js') }}"></script>
@endpush

<x-adminLayout>

    <div class="{{ $cssNs }}">

    @include('admin.layouts.breadcrumb', [
        'title' => __('Pages'),
        'description' => (@$page ? __('Page Introduction Edit') : __('Page Introduction Add')),
        'breadcrum' => [
            __('Pages') => route('page.index'),
            (@$page ? __('Edit') . ' ' . \Str::Lower(__('Page')) . ': ' . $page->page_title : __('Page') . ' ' . \Str::Lower(__('Add'))) => '#'
        ],
    ])

    @if($errors->any())

        <div class="alert alert-fill-danger alert-dismissible fade show" role="alert">
            {{ __('Alert Error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
        </div>

    @endif

    <form class="form-content" method="post" action="{{ (@$page ? route('page.update', $page) : route('page.store')) }}" enctype="multipart/form-data">

        @csrf

        @if(@$page)

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

                                <li class="nav-item">
                                    <a class="nav-link" id="slider-line-tab" data-bs-toggle="tab" data-bs-target="#slider" role="tab" aria-controls="slider" aria-selected="true">{{ __('Slider') }}</a>
                                </li>

                            </ul>

                            <div class="tab-content mt-3" id="lineTabContent">

                                <div class="tab-pane fade show active" id="content_tab" role="tabpanel" aria-labelledby="content-line-tab">

                                    @include('admin.modules.page.includes.content')

                                </div>

                                <div class="tab-pane fade" id="meta" role="tabpanel" aria-labelledby="meta-line-tab">

                                    @include('admin.modules.page.includes.meta')

                                </div>

                                <div class="tab-pane fade" id="og" role="tabpanel" aria-labelledby="og-line-tab">

                                    @include('admin.modules.page.includes.og')

                                </div>

                                <div class="tab-pane fade" id="slider" role="tabpanel" aria-labelledby="slider-line-tab">

                                    @include('admin.modules.page.includes.slider', [
                                        'page' => @$page,
                                        'pageSlides' => @$pageSlides
                                    ])

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="form-submit">
            <button type="submit" class="btn btn-primary">{{ (@$page ? __('Edit') : __('Add')) }}</button>
        </div>

    </form>

</div>

</x-adminLayout>
