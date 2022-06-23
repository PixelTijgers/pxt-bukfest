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
                />

            </div>

            <div class="offset-1 col-3">

                <x-form.input
                    type="text"
                    name="invoiceRule[0][price]"
                    :label="__('Price')"
                />

                <x-form.input
                    type="text"
                    name="invoiceRule[0][amount]"
                    :label="__('Amount')"
                />

            </div>

        </div>

    </div>

</li>
