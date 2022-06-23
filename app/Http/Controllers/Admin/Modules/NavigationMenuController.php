<?php

// Controller namespacing.
namespace App\Http\Controllers\Admin\Modules;
use App\Http\Controllers\Controller;

// Facades.
use Yajra\Datatables\Datatables;
use Yajra\DataTables\Html\Builder;

// Models.
use App\Models\NavigationMenu;

// Request
use App\Http\Requests\NavigationMenuRequest;

// Traits
use App\Traits\HasRightsTrait;
use App\Traits\MediaHandlerTrait;

class NavigationMenuController extends Controller
{
    /**
     * Traits
     *
     */
    use HasRightsTrait;
    use MediaHandlerTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Builder $builder)
    {
        // Init datatables.
        if (request()->ajax()) {
            return DataTables::of(NavigationMenu::query())
            ->editColumn('created_at', function(NavigationMenu $navigationMenu) {
                return $navigationMenu->created_at->formatLocalized('%e %B %Y');
            })
            ->addColumn('action', function (NavigationMenu $navigationMenu, navigationMenus) {
                return $this->getActionColumn($navigationMenu);
            })
            ->make(true);
        }

        // Set values.
        $html = $builder
                    ->addColumn([
                        'data' => 'created_at',
                        'title' => 'Aangemaakt op'
                    ])
                    ->addAction([
                        'title' => 'Acties',
                        'class' => 'actionHandler'
                    ])
                    ->parameters([
                        'order' => [
                            0,
                            'asc'
                        ]
                    ]);

        return view('admin.modules.navigationMenu.index', compact('html'));
    }

    /**
     * Generate the actions buttons for the dataTables.
     *
     * @param $data
     * @return string
     */
    protected function getActionColumn($data, $route): string
    {
            /**
             *
             *   <a href="' . url('/admin/modules/posts/' . $data->id) . '" class="btn btn-success btn-icon mr-2">
                    <i class="far fa-eye"></i>
                </a>
             *
             */
        $actions = '<div class="d-flex">';

        if (auth()->user()->can('modules.navigationMenu.edit')) {
            $actions .= '<a href="' . url('/admin/modules/' . $route . '/' . $data->id . '/edit') . '" class="btn btn-warning btn-icon mr-2">
                            <i class="far fa-pencil"></i>
                        </a>';
        }

        if (auth()->user()->can('modules.navigationMenu.destroy'))
        {
            $actions .= '<form class="delete-item-form" method="POST" action="/admin/modules/' . $route . '/' . $data->id . '">
                        ' . csrf_field() . '
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger btn-icon">
                            <i class="fas fa-trash"></i>
                        </button>';
        }

        $actions .= '</div>';

        return $actions;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($navigationMenu)
    {
        // Init view.
        return view('admin.modules.navigationMenu.show', compact('navigationMenu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  NavigationMenuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Init view.
        return view('admin.modules.navigationMenu.createEdit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $navigationMenu
     * @return \Illuminate\Http\Response
     */
    public function store(NavigationMenuRequest $request)
    {
        // Unguard the values.
        NavigationMenu::unguard();

        // Post data to database.
        $navigationMenu = NavigationMenu::Create([

        ] + $request->validated());

        // Upload avatar.
        $this->manageInputMedia($navigationMenu, 'CollectionName');

        // Guard the values again.
        NavigationMenu::reguard();

        // Return back with message.
        return redirect()->route('navigationMenu.index')->with([
                'type' => 'success',
                'message' => '[ ... ] is met succes opgeslagen.'
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $navigationMenu
     * @return \Illuminate\Http\Response
     */
    public function edit(NavigationMenu $navigationMenu)
    {
        // Init view.
        return view('admin.modules.navigationMenu.createEdit', compact('navigationMenu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  NavigationMenuRequest  $request
     * @param  int  $navigationMenu
     * @return \Illuminate\Http\Response
     */
    public function update(NavigationMenuRequest $request, NavigationMenu $navigationMenu)
    {
        // Unguard the values.
        NavigationMenu::unguard();

        // Set data to save into database.
        $navigationMenu->update([

        ] + $request->validated());

        // Only change avatar when there's a file uploaded.
        if($request->exists('collectionNameCurrentImage') && !$request->filled('collectionNameCurrentImage'))
            $player->clearMediaCollection('collectionName');
        elseif($request->hasFile('collectionName'))
            // Upload avatar.
            $this->manageInputMedia($player, 'collectionName');

        // Save data.
        $navigationMenu->save();

        // Guard the values again.
        NavigationMenu::reguard();

        // Return back with message.
        return redirect()->route('navigationMenu.index')->with([
                'type' => 'success',
                'message' => '[ ... ] is met succes gewijzigd.'
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $navigationMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy(NavigationMenu $navigationMenu)
    {
        // Delete the model.
        $navigationMenu->delete();

        // Return back with message.
        return redirect()->back()->with([
            'type' => 'success',
            'message' => '[ ... ] is met succes verwijderd.'
        ]);
    }
}
