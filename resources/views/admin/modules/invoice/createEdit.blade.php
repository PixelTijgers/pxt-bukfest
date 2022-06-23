@section('meta')
<title>{{ config('app.name') }} | {{ (@$invoice ? __('Edit') . ' ' . \Str::Lower(__('Invoice')) . ': #' . $invoice->id_invoice  : __('Invoice') . ' ' . \Str::Lower(__('Add'))) }}</title>
@endsection

<x-adminLayout>

    <div class="{{ $cssNs }}">

        @include('admin.layouts.breadcrumb', [
            'title' => __('Invoice'),
            'description' => (@$invoice ? __('Edit') . ' ' . \Str::Lower(__('Invoice')) . ': #' . $invoice->id_invoice  : __('Invoice Add')),
            'breadcrum' => [
                __('Invoice') => route('invoice.index'),
                (@$invoice ? __('Edit') . ' ' . \Str::Lower(__('Invoice')) . ': #' . $invoice->id_invoice  : __('Invoice') . ' ' . \Str::Lower(__('Add'))) => '#'
            ],
        ])

        @if ($errors->any())

            <div class="alert alert-fill-danger alert-dismissible fade show" role="alert">
                {{ __('Alert Error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
            </div>

        @endif

        <form class="form-content" method="post" action="{{ (@$invoice ? route('invoice.update', $invoice) : route('invoice.store')) }}">

            @csrf

            @if(@$invoice)

            @method('PATCH')

            @endif

            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">

                    <div class="card">

                        <div class="card-body">

                            <ul class="nav nav-tabs nav-tabs-line" id="lineTab" role="tablist">

                                <li class="nav-item">
                                    <a class="nav-link active" id="contact-line-tab" data-bs-toggle="tab" data-bs-target="#details" role="tab" aria-controls="details" aria-selected="true">{{ __('Details') }}</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="invoice-line-tab" data-bs-toggle="tab" data-bs-target="#invoice" role="tab" aria-controls="invoice" aria-selected="true">{{ __('Invoice') }}</a>
                                </li>

                            </ul>

                            <div class="tab-content mt-3" id="lineTabContent">

                                <div class="tab-pane fade show active" id="details" role="tabpanel" aria-labelledby="contact-line-tab">

                                    @include('admin.modules.invoice.includes.details')

                                </div>

                                <div class="tab-pane fade" id="invoice" role="tabpanel" aria-labelledby="invoice-line-tab">

                                    @include('admin.modules.invoice.includes.invoice', ['invoiceRules' => @$invoiceRules])

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="form-submit">
                <button type="submit" class="btn btn-primary">{{ (@$invoice ? __('Edit') : __('Add')) }}</button>
            </div>

        </form>

    </div>

</x-adminLayout>
