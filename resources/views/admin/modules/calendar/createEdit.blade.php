@section('meta')
<title>{{ config('app.name') }} | {{ (@$calendar ? __('Edit') . ' ' . \Str::Lower(__('Calendars')) . ': ' . $calendar->name  : __('Calendars') . ' ' . \Str::Lower(__('Add'))) }}</title>
@endsection

<x-adminLayout>

    <div class="{{ $cssNs }}">

        @include('admin.layouts.breadcrumb', [
            'title' => __('Calendars'),
            'description' => (@$post ? __('Calendars Introduction Edit') : __('Calendars Introduction Add')),
            'breadcrum' => [
                __('Calendars') => route('calendar.index'),
                (@$calendar ? __('Edit') . ' ' . \Str::Lower(__('Calendars')) . ': ' . $calendar->name  : __('Calendars') . ' ' . \Str::Lower(__('Add'))) => '#'
            ],
        ])

        @if ($errors->any())

            <div class="alert alert-fill-danger alert-dismissible fade show" role="alert">
                {{ __('Alert Error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
            </div>

        @endif

        <form class="form-content" method="post" action="{{ (@$calendar ? route('calendar.update', $calendar) : route('calendar.store')) }}">

            @csrf

            @if(@$calendar)

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

                                        @include('admin.modules.calendar.includes.content')

                                    </div>

                                    <div class="tab-pane fade" id="meta" role="tabpanel" aria-labelledby="meta-line-tab">

                                        @include('admin.modules.calendar.includes.meta')

                                    </div>

                                    <div class="tab-pane fade" id="og" role="tabpanel" aria-labelledby="og-line-tab">

                                        @include('admin.modules.calendar.includes.og')

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="form-submit">
                <button type="submit" class="btn btn-primary">{{ (@$calendar ? __('Edit') : __('Add')) }}</button>
            </div>

        </form>

    </div>

</x-adminLayout>
