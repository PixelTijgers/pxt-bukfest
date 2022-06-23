<h6 class="card-title mt-4">{{ __('Details') }}</h6>
<p class="mb-4 text-muted small">{{ __('Content Introduction Details') }}</p>

<x-form.input
    type="text"
    name="id_invoice"
    :label="__('Invoice ID')"
    :value="(old('id_invoice') ? old('id_invoice') : (@$invoice ? $invoice->id_invoice : null))"
    :row="true"
    :cols="['col-2', 'col-3']"
/>

<x-form.select
    name="client_id"
    :label="__('Client')"
    :row="true"
    :cols="['col-2', 'col-3']"
    :value="(old('client_id') ? old('client_id') : (@$invoice ? $invoice->client_id : null))"
    :options="\App\Models\Client::all()->sortBy('name')"
    :valueWrapper="['id', 'name']"
    :disabledOption="__('Client Select')"
/>

<x-form.date
    name="invoice_date"
    :label="__('Invoice Date')"
    :value="(old('invoice_date') ? old('invoice_date') : (@$invoice ? $invoice->invoice_date : null))"
    :row="true"
    :cols="['col-2', 'col-3']"
/>

<x-form.select
    name="vat"
    :label="__('BTW')"
    :row="true"
    :cols="['col-2', 'col-3']"
    :value="(old('vat') ? old('vat') : (@$invoice ? $invoice->vat : null))"
    :options="[
       '0'   =>  'Geen / Vrijgesteld',
       '9'   =>  '9%',
       '21'  => '21%',
    ]"
    :disabledOption="__('Select Status')"
/>

<x-form.switcher
    name="is_payed"
    :label="__('Payed')"
    :value="(old('is_payed') ? old('is_payed') : (@$invoice ? $invoice->is_payed : null))"
    :row="true"
    :cols="['col-2', 'col-3']"
    :required="false"
/>
