<?php

// Controller namespacing.
namespace App\Http\Controllers\Admin\Modules;
use App\Http\Controllers\Controller;

// Facades.
use Yajra\Datatables\Datatables;
use Yajra\DataTables\Html\Builder;

// Models.
use App\Models\Team;

// Request
use App\Http\Requests\TeamRequest;

// Traits
use App\Traits\DataTableActionsTrait;
use App\Traits\HasRightsTrait;

class TeamController extends Controller
{
    /**
     * Traits
     *
     */
    use DataTableActionsTrait,
        HasRightsTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Builder $builder)
    {
        // Init datatables.
        if (request()->ajax()) {
            return DataTables::of(Team::query())
            ->addColumn('action', function (Team $team) {
                return
                    '<div class="d-flex">' .
                        $this->setAction('team.index', $team, 'view', 'teams', false) .
                        $this->setAction('team.edit', $team, 'update', 'teams') .
                        $this->setAction('team.destroy', $team, 'destroy', 'teams') .
                    '</div>';
            })
            ->make(true);
        }

        // Set values.
        $html = $builder
                    ->addColumn([
                        'title' => __('Teamname'),
                        'data' => 'name'
                    ])
                    ->addColumn([
                        'title' => __('Teamname Short'),
                        'data' => 'name_short'
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
        return view('admin.modules.team.index', compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Init view.
        return view('admin.modules.team.createEdit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamRequest $request)
    {
        // Post data to database.
        Team::Create($request->validated());

        // Return back with message.
        return redirect()->route('team.index')->with([
                'type' => 'success',
                'message' => __('Alert Add')
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        // Init view.
        return view('admin.modules.team.createEdit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(TeamRequest $request, Team $team)
    {
        // Set data to save into database.
        $team->update($request->validated());

        // Save data.
        $team->save();

        // Return back with message.
        return redirect()->route('team.index')->with([
                'type' => 'success',
                'message' => __('Alert Edit')
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        // Delete the model.
        $team->delete();

        // Return back with message.
        return redirect()->back()->with([
            'type' => 'success',
            'message' => __('Alert Delete')
        ]);
    }
}
