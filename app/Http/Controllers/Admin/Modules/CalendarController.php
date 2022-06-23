<?php

// Controller namespacing.
namespace App\Http\Controllers\Admin\Modules;
use App\Http\Controllers\Controller;

// Facades.
use Yajra\Datatables\Datatables;
use Yajra\DataTables\Html\Builder;

// Models.
use App\Models\Calendar;

// Request
use App\Http\Requests\CalendarRequest;

// Traits
use App\Traits\DataTableActionsTrait;
use App\Traits\HasRightsTrait;
use App\Traits\MediaHandlerTrait;

// Carbon
use Carbon\Carbon;

class CalendarController extends Controller
{
    /**
     * Traits
     *
     */
    use DataTableActionsTrait,
        HasRightsTrait,
        MediaHandlerTrait;

    /**
     * Process the image request.
     *
     * @param  collection $request
     * @param  int  $page
     * @param  string $imageName
     * @return \Illuminate\Http\Response
     */
    protected function processImage($request, $model, $imageName)
    {
        // Only change page image when there's a file uploaded.
        if($request->exists($imageName . 'CurrentImage') && !$request->filled($imageName . 'CurrentImage'))
            // Delete image.
            $model->clearMediaCollection($imageName);
        elseif($request->hasFile($imageName))
            // Upload image.
            $this->manageInputMedia($model, $imageName);
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
            return DataTables::of(Calendar::query())
            ->editColumn('title', function(Calendar $calendar) {
                return \Str::words($calendar->title, 5);
            })
            ->editColumn('published_at', function(Calendar $calendar) {
                return Carbon::parse($calendar->published_at)->formatLocalized('%d-%m-%Y om %H:%M');
            })
            ->editColumn('status', function(Calendar $calendar) {
                if($calendar->published_at < Carbon::now() && $calendar->status === 'published')
                    return '<span class="badge bg-success d-block"><i class="fas fa-check"></i></span>';
                else
                    return '<span class="badge bg-danger d-block"><i class="fas fa-times"></i></span>';
            })
            ->addColumn('action', function (Calendar $calendar) {
                return
                    '<div class="d-flex">' .
                        $this->setAction('calendar.index', $calendar, 'view', 'calendar', false) .
                        $this->setAction('calendar.edit',$calendar, 'update', 'calendar') .
                        $this->setAction('calendar.destroy',$calendar, 'destroy', 'calendar') .
                    '</div>';
            })
            ->rawColumns([
                'status',
                'action'
            ])
            ->make(true);
        }

        // Set values.
        $html = $builder
                    ->addColumn([
                        'title' => __('Title'),
                        'data' => 'title',
                    ])
                    ->addColumn([
                        'title' => __('Published At'),
                        'data' => 'published_at',
                    ])
                    ->addColumn([
                        'title' => __('Status'),
                        'data' => 'status',
                        'class' => 'published'
                    ])
                    ->addAction([
                        'title' => __('Actions'),
                        'class' => 'actionHandler'
                    ])
                    ->parameters([
                        'order' =>
                            [2,'asc'],
                            [0,'asc']
                    ]);

        return view('admin.modules.calendar.index', compact('html'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CalendarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Init view.
        return view('admin.modules.calendar.createEdit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $calendar
     * @return \Illuminate\Http\Response
     */
    public function store(CalendarRequest $request)
    {
        // Calendar data to database.
        $calendar = Calendar::Create($request->validated());

        // Page header image.
        $this->processImage($request, $calendar, 'calendarImage');

        // Page OG image.
        $this->processImage($request, $calendar, 'ogImage');

        // Return back with message.
        return redirect()->route('calendar.index')->with([
                'type' => 'success',
                'message' => __('Alert Add')
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $calendar
     * @return \Illuminate\Http\Response
     */
    public function edit(Calendar $calendar)
    {
        // Init view.
        return view('admin.modules.calendar.createEdit', compact('calendar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CalendarRequest  $request
     * @param  int  $calendar
     * @return \Illuminate\Http\Response
     */
    public function update(CalendarRequest $request, Calendar $calendar)
    {
        // Set data to save into database.
        $calendar->update($request->validated());

        // Page header image.
        $this->processImage($request, $calendar, 'calendarImage');

        // Page OG image.
        $this->processImage($request, $calendar, 'ogImage');

        // Save data.
        $calendar->save();

        // Return back with message.
        return redirect()->route('calendar.index')->with([
                'type' => 'success',
                'message' => __('Alert Edit')
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $calendar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Calendar $calendar)
    {
        // Delete the model.
        $calendar->delete();

        // Return back with message.
        return redirect()->back()->with([
            'type' => 'success',
            'message' => __('Alert Delete')
        ]);
    }
}
