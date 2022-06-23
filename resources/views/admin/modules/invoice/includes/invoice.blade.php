<h6 class="card-title mt-4">{{ __('Invoice') }}</h6>
<p class="mb-4 text-muted small">{{ __('Content Introduction Invoice Rules') }}</p>

<button class="addButton btn btn-primary mb-3 float-right" type="button">{{ __('Rule Add') }}</button>

<ul id="invoiceRules" class="mt-4">

    @if($invoiceRules !== null && !$invoiceRules->isEmpty())

        @foreach($invoiceRules as $key => $slide)

        <li class="slider-item mb-3">

            <div class="row">

                <div class="col-md-12 mb-3">

                    <div class="border-bottom d-flex justify-content-end w-full pb-3">

                        <button class="closeButton btn btn-danger" type="button">{{ __('Slide Delete') }}</button>

                    </div>

                </div>

                <div class="row">

                    <div class="col-6">

                        <x-form.textarea
                            name="invoiceRule[0][description]"
                            maxLength="100"
                            :label="__('Caption')"
                            :value="$slide->description"
                        />

                    </div>

                <div class="offset-1 col-3">

                    <x-form.input
                        type="text"
                        name="invoiceRule[0][price]"
                        :label="__('Price')"
                        :value="number_format($slide->price, 2, ',', '.')"
                    />

                    <x-form.input
                        type="text"
                        name="invoiceRule[0][amount]"
                        :label="__('Amount')"
                        :value="$slide->amount"
                    />

                </div>

            </div>

        </li>

        @endforeach()

    @else
        @include('admin.modules.invoice.includes.invoice-rule')

    @endif
</ul>
