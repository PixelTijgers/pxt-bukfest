<?php

// Controller namespacing.
namespace App\Http\Controllers\Admin\Modules;
use App\Http\Controllers\Controller;

// Facades.
use Yajra\Datatables\Datatables;
use Yajra\DataTables\Html\Builder;
use PDF;

// Models.
use App\Models\Client;
use App\Models\Detail;
use App\Models\Invoice;
use App\Models\InvoiceRule;

// Request
use App\Http\Requests\InvoiceRequest;

// Traits
use App\Traits\DataTableActionsTrait;
use App\Traits\HasRightsTrait;

// Carbon
use Carbon\Carbon;

class InvoiceController extends Controller
{
    /**
     * Traits
     *
     */
    use DataTableActionsTrait;
    use HasRightsTrait;

    /**
     * Download the invoice.
     *
     * @return \Illuminate\Http\Response
     */
     protected function downloadInvoice(Invoice $invoice)
     {

        // Get the company details.
        $details = Detail::find(1)->firstOrFail();

        // Get the client details.
        $client = Client::where('id', $invoice->client_id)->firstOrFail();

        $invoiceRules = InvoiceRule::where('invoice_id', $invoice->id)->get();

        $calculateSum = array();

        foreach($invoiceRules as $invoiceRule) {
            $calculateSum[] = $invoiceRule['price'] * $invoiceRule['amount'];
        }

        $calculateTotal = array_sum($calculateSum);
        $calculateVat = ($invoice['vat'] === 21 ? ($calculateTotal / 100) * 21  :  ($invoice['vat'] === 9 ? ($calculateTotal / 100) * 9 : 0));

        // selecting PDF view
        $pdf = PDF::loadView('admin.modules.invoice.includes.invoice-view', array('invoice' => $invoice, 'details' => $details, 'client' => $client, 'invoiceRules' => $invoiceRules, 'calculateTotal' => $calculateTotal, 'calculateVat' => $calculateVat));

        // download pdf file
        return $pdf->download($invoice->id_invoice . '.pdf');
     }

     /**
      * Process the invoice rules.
      *
      * @return \Illuminate\Http\Response
      */
     protected function processInvoiceRules($request, $model)
     {
         // Delete the older invoice rules.
         InvoiceRule::where('invoice_id', $model->id)->delete();

         // Add new rules.
         foreach($request->invoiceRule as $key => $rule)
         {
             InvoiceRule::create([
                 'invoice_id' => $model->id,
                 'description' => $rule['description'],
                 'price' => number_format((float) $rule['price'], 3),
                 'amount' => $rule['amount']
             ]);
         }

         return true;
     }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Builder $builder)
    {
        // Init datatables.
        if (request()->ajax()) {
            return DataTables::of(Invoice::query()->with(['client']))
            ->editColumn('invoice_date', function(Invoice $invoice) {
                return $invoice->invoice_date->formatLocalized('%d-%m-%Y');
            })
            ->editColumn('id', function(Invoice $invoice) {
                return '<a title="Download Factuur" class="btn btn-primary btn-reset" href="' . route('invoice.download', $invoice->id) . '" target="_blank"><i class="fa-solid fa-download"></i></a>';
            })
            ->editColumn('is_payed', function(Invoice $invoice) {
                if($invoice->is_payed === true)
                    return '<span class="badge bg-success d-block"><i class="fas fa-check"></i></span>';
                else
                    return '<span class="badge bg-danger d-block"><i class="fas fa-times"></i></span>';
            })
            ->addColumn('action', function (Invoice $invoice) {
                return
                    '<div class="d-flex">' .
                    $this->setAction('invoice.index', $invoice, 'view', 'invoices', false) .
                    $this->setAction('invoice.edit', $invoice, 'update', 'invoices') .
                    $this->setAction('invoice.destroy', $invoice, 'destroy', 'invoices') .
                    '</div>';
            })
            ->rawColumns([
                'id',
                'is_payed',
                'action'
            ])
            ->make(true);
        }

        // Set values.
        $html = $builder
                    ->addColumn([
                        'title' => __('#'),
                        'data' => 'id',
                        'class' => 'download'
                    ])
                    ->addColumn([
                        'title' => 'Factuur',
                        'data' => 'id_invoice'
                    ])
                    ->addColumn([
                        'title' => __('Client'),
                        'data' => 'client.name'
                    ])
                    ->addColumn([
                        'title' => __('Contactperson'),
                        'data' => 'client.contact'
                    ])
                    ->addColumn([
                        'title' => __('Date'),
                        'data' => 'invoice_date'
                    ])
                    ->addColumn([
                        'title' => __('Payed'),
                        'data' => 'is_payed',
                        'class' => 'published'
                    ])
                    ->addAction([
                        'title' => __('Actions'),
                        'class' => 'actionHandler'
                    ])
                    ->parameters([
                        'order' =>
                            [4,'desc']
                    ]);

        // Init view.
        return view('admin.modules.invoice.index', compact('html'));
    }

    /**
     * Show the selected invoice.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        // Init view.
        return view('admin.modules.invoice.show', compact('invoice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Init view.
        return view('admin.modules.invoice.createEdit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InvoiceRequest $request)
    {
        // Post data to database.
        $invoice = Invoice::Create($request->validated());

        // Post invoice rules to database.
        $this->processInvoiceRules($request, $invoice);

        // Return back with message.
        return redirect()->route('invoice.index')->with([
                'type' => 'success',
                'message' => __('Alert Add')
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        // Get the invoice rules.
        $invoiceRules = InvoiceRule::where('invoice_id', $invoice->id)->get();

        // Init view.
        return view('admin.modules.invoice.createEdit', compact('invoice', 'invoiceRules'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(InvoiceRequest $request, Invoice $invoice)
    {
        // Set data to save into database.
        $invoice->update($request->validated());

        // Post invoice rules to database.
        $this->processInvoiceRules($request, $invoice);

        // Save data.
        $invoice->save();

        // Return back with message.
        return redirect()->route('invoice.index')->with([
                'type' => 'success',
                'message' => __('Alert Edit')
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        // Delete the model.
        $invoice->delete();

        // Return back with message.
        return redirect()->back()->with([
            'type' => 'success',
            'message' => __('Alert Delete')
        ]);
    }
}
