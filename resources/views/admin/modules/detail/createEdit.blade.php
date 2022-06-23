@section('meta')
    <title>{{ config('app.name') }} | {{ (@$detail ? __('Edit') . ' ' . \Str::Lower(__('Details')) . ': ' . $detail->name  : __('Details') . ' ' . \Str::Lower(__('Add'))) }}</title>
    <meta name="description" content="{{ (@$detail ? __('Details Edit') : __('Details Add')) }}" />
@endsection

<x-adminLayout>

    <div class="{{ $cssNs }}">

        @include('admin.layouts.breadcrumb', [
            'title' => __('Details'),
            'description' => (@$detail ? __('Edit') . ' ' . \Str::Lower(__('Details')) . ': ' . $detail->name  : __('Details Add')),
            'breadcrum' => [
                __('Details') => '#',
                (@$detail ? __('Edit') . ' ' . \Str::Lower(__('Details')) . ': ' . $detail->name  : __('Details') . ' ' . \Str::Lower(__('Add'))) => '#'
            ],
        ])
        @if ($errors->any())

        <div class="alert alert-fill-danger alert-dismissible fade show" role="alert">
            {{ __('Item Error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
        </div>
        @endif

        <form class="form-content" method="post" action="{{ (@$detail ? route('detail.update', $detail) : route('detail.store')) }}">

            @csrf

            @if(@$detail)

            @method('PATCH')

            @endif

            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">

                            <ul class="nav nav-tabs nav-tabs-line" id="lineTab" role="tablist">

                                <li class="nav-item">
                                    <a class="nav-link active" id="contact-line-tab" data-bs-toggle="tab" data-bs-target="#contact" role="tab" aria-controls="contact" aria-selected="true">{{ __('Contact') }}</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="invoice-line-tab" data-bs-toggle="tab" data-bs-target="#invoice" role="tab" aria-controls="invoice" aria-selected="true">{{ __('Invoice') }}</a>
                                </li>

                            </ul>

                            <div class="tab-content mt-3" id="lineTabContent">

                                <div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="contact-line-tab">

                                    @include('admin.modules.detail.includes.contact')

                                </div>

                                <div class="tab-pane fade" id="invoice" role="tabpanel" aria-labelledby="invoice-line-tab">

                                    @include('admin.modules.detail.includes.invoice')

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="form-submit">
                <button type="submit" class="btn btn-primary">{{ (@$detail ? __('Edit') : __('Add')) }}</button>
            </div>

        </form>

    </div>

</x-adminLayout>
