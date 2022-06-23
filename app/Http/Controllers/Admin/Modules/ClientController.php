<?php

// Controller namespacing.
namespace App\Http\Controllers\Admin\Modules;
use App\Http\Controllers\Controller;

// Facades.
use Yajra\Datatables\Datatables;
use Yajra\DataTables\Html\Builder;

// Models.
use App\Models\Client;

// Request
use App\Http\Requests\ClientRequest;

// Traits
use App\Traits\DataTableActionsTrait;
use App\Traits\HasRightsTrait;
use App\Traits\MediaHandlerTrait;

class ClientController extends Controller
{
    /**
     * Traits
     *
     */
    use DataTableActionsTrait,
        HasRightsTrait,
        MediaHandlerTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Builder $builder)
    {
        // Init datatables.
        if (request()->ajax()) {
            return DataTables::of(Client::query())
            ->editColumn('name', function(Client $client) {

                if($client->getFirstMediaUrl('clientImage') !== '')
                    $avatar = $client->getFirstMediaUrl('clientImage');
                else
                    $avatar = asset('img/admin/default_user.png');

                $avatarName = '<img src="' . $avatar . '" width="20" height="20"/>';

                $avatarName .= '<span class="d-inline-flex px-2">' . $client->name . '</span>';

                return $avatarName;
            })
            ->addColumn('action', function (Client $client) {
                return
                    '<div class="d-flex">' .
                    $this->setAction('client.index', $client, 'view', 'clients', false) .
                    $this->setAction('client.edit', $client, 'update', 'clients') .
                    $this->setAction('client.destroy', $client, 'destroy', 'clients') .
                    '</div>';
            })
            ->rawColumns([
                'name',
                'action'
            ])
            ->make(true);
        }

        // Set values.
        $html = $builder
                    ->addColumn([
                        'title' => __('Name'),
                        'data' => 'name'
                    ])
                    ->addColumn([
                        'title' => __('Contactperson'),
                        'data' => 'contact'
                    ])
                    ->addColumn([
                        'title' => __('Mobile'),
                        'data' => 'mobile'
                    ])
                    ->addColumn([
                        'title' => __('Email'),
                        'data' => 'email'
                    ])
                    ->addAction([
                        'title' => __('Actions'),
                        'class' => 'actionHandler'
                    ])
                    ->parameters([
                        'order' =>
                            [0,'asc']
                    ]);

        // Init view.
        return view('admin.modules.client.index', compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Init view.
        return view('admin.modules.client.createEdit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        // Post data to database.
        $client = Client::Create($request->validated());

        $this->manageInputMedia($client, 'clientImage');

        // Return back with message.
        return redirect()->route('client.index')->with([
                'type' => 'success',
                'message' => __('Alert Add')
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        // Init view.
        return view('admin.modules.client.createEdit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, Client $client)
    {
        // Set data to save into database.
        $client->update($request->validated());

        // Only change avatar when there's a file uploaded and upload avatar.
        if($request->hasFile('clientImage'))
            $this->manageInputMedia($client, 'clientImage');

        // Save data.
        $client->save();

        // Return back with message.
        return redirect()->route('client.index')->with([
                'type' => 'success',
                'message' => __('Alert Edit')
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        // Delete the model.
        $client->delete();

        // Return back with message.
        return redirect()->back()->with([
            'type' => 'success',
            'message' => __('Alert Delete')
        ]);
    }
}
