<?php

// Controller namespacing.
namespace App\Http\Controllers\Admin\Modules;
use App\Http\Controllers\Controller;

// Facades.
use Yajra\Datatables\Datatables;
use Yajra\DataTables\Html\Builder;

// Models.
use App\Models\Board;

// Request
use App\Http\Requests\BoardRequest;

// Traits
use App\Traits\DataTableActionsTrait;
use App\Traits\HasRightsTrait;

class BoardController extends Controller
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
            return DataTables::of(Board::query())
            ->addColumn('action', function (Board $board) {
                return
                    '<div class="d-flex">' .
                        $this->setAction('board.index', $board, 'view', 'board', false) .
                        $this->setAction('board.edit', $board, 'update', 'board') .
                        $this->setAction('board.destroy', $board, 'destroy', 'board') .
                    '</div>';
            })
            ->make(true);
        }

        // Set values.
        $html = $builder
                    ->addColumn([
                        'title' => __('Name'),
                        'data' => 'name'
                    ])
                    ->addColumn([
                        'title' => __('Phone'),
                        'data' => 'phone'
                    ])
                    ->addColumn([
                        'title' => __('Email'),
                        'data' => 'email'
                    ])
                    ->addColumn([
                        'title' => __('Boardfunction'),
                        'data' => 'boardfunction'
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
        return view('admin.modules.board.index', compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Init view.
        return view('admin.modules.board.createEdit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BoardRequest $request)
    {
        // Post data to database.
        Board::Create($request->validated());

        // Return back with message.
        return redirect()->route('board.index')->with([
                'type' => 'success',
                'message' => __('Alert Add')
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function edit(Board $board)
    {
        // Init view.
        return view('admin.modules.board.createEdit', compact('board'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function update(BoardRequest $request, Board $board)
    {
        // Set data to save into database.
        $board->update($request->validated());

        // Save data.
        $board->save();

        // Return back with message.
        return redirect()->route('board.index')->with([
                'type' => 'success',
                'message' => __('Alert Edit')
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $board
     * @return \Illuminate\Http\Response
     */
    public function destroy(Board $board)
    {
        // Delete the model.
        $board->delete();

        // Return back with message.
        return redirect()->back()->with([
            'type' => 'success',
            'message' => __('Alert Delete')
        ]);
    }
}
