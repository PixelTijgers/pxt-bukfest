<?php

// Controller namespacing.
namespace App\Http\Controllers\Admin\Modules;
use App\Http\Controllers\Controller;

// Facades.
use Yajra\Datatables\Datatables;
use Yajra\DataTables\Html\Builder;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

// Models.
use App\Models\Member;
use App\Models\Membership;

// Request
use App\Http\Requests\MemberRequest;

// Exports
use App\Exports\Members\MembersExport;

// Traits
use App\Traits\DataTableActionsTrait;
use App\Traits\HasRightsTrait;

class MemberController extends Controller
{
    /**
     * Traits
     *
     */
    use DataTableActionsTrait,
        HasRightsTrait;

    /**
     * Export all the members.
     *
     * @return \Illuminate\Http\Response
     */
    public function export()
    {
        return Excel::download(new MembersExport, 'Overzicht-leden_' . date('Y') . '_' . date('m') . '_' . date('d') . '_' . date('His') . '.xlsx');
    }

    /**
     * Download the contribution nota.
     *
     * @return \Illuminate\Http\Response
     */
     protected function downloadContribution($contribution, Member $member)
     {
         // Get correct price for the selected season half. After that, convert the price.
         $getContributionPrice = Membership::select($contribution)->first();
         $contributionPrice = number_format($getContributionPrice->$contribution, 2, ',', '.');

        // selecting PDF view
        $pdf = PDF::loadView('admin.modules.member.contribution-view', array('member' => $member, 'contributionPrice' => $contributionPrice));

        // download pdf file
        return $pdf->download(\Str::snake($member->name) . '_contributie_.pdf');
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
            return DataTables::of(Member::query()->with(['membership','team']))
            ->editColumn('membership.contribution_first_half', function(Member $member) {
                return '<a title="Download contributiebrief eerste seizoenshelft" class="btn btn-primary btn-reset" href="' . route('contribution.download', ['contribution_first_half', $member]) . '" target="_blank"><i class="fa-solid fa-download"></i></a>';
            })
            ->editColumn('membership.contribution_second_half', function(Member $member) {
                return '<a title="Download contributiebrief tweede seizoenshelft" class="btn btn-primary btn-reset" href="' . route('contribution.download', ['contribution_second_half', $member]) . '" target="_blank"><i class="fa-solid fa-download"></i></a>';
            })
            ->editColumn('street', function (Member $member){
                return $member->street . ' ' . $member->number;
            })
            ->addColumn('action', function (Member $member) {
                return
                    '<div class="d-flex">' .
                        $this->setAction('member.index', $member, 'view', 'members', false) .
                        $this->setAction('member.edit', $member, 'update', 'members') .
                        $this->setAction('member.destroy', $member, 'destroy', 'members') .
                    '</div>';
            })
            ->rawColumns([
                'membership.contribution_first_half',
                'membership.contribution_second_half',
                'action'
            ])
            ->make(true);
        }

        // Set values.
        $html = $builder
                    ->addColumn([
                        'title' => '#',
                        'data' => 'membership.contribution_first_half',
                        'class' => 'download'
                    ])
                    ->addColumn([
                        'title' => '#',
                        'data' => 'membership.contribution_second_half',
                        'class' => 'download'
                    ])
                    ->addColumn([
                        'title' => __('Name'),
                        'data' => 'name'
                    ])
                    ->addColumn([
                        'title' => __('Team'),
                        'data' => 'team.name'
                    ])
                    ->addColumn([
                        'title' => __('Membership'),
                        'data' => 'membership.name'
                    ])
                    ->addAction([
                        'title' => __('Actions'),
                        'class' => 'actionHandler'
                    ])
                    ->parameters([
                        'order' =>
                            [2,'asc']
                    ]);

        // Init view.
        return view('admin.modules.member.index', compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Init view.
        return view('admin.modules.member.createEdit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MemberRequest $request)
    {
        // Post data to database.
        Member::Create($request->validated());

        // Return back with message.
        return redirect()->route('member.index')->with([
                'type' => 'success',
                'message' => __('Alert Add')
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        // Init view.
        return view('admin.modules.member.createEdit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(MemberRequest $request, Member $member)
    {
        // Set data to save into database.
        $member->update($request->validated());

        // Save data.
        $member->save();

        // Return back with message.
        return redirect()->route('member.index')->with([
                'type' => 'success',
                'message' => __('Alert Edit')
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        // Delete the model.
        $member->delete();

        // Return back with message.
        return redirect()->back()->with([
            'type' => 'success',
            'message' => __('Alert Delete')
        ]);
    }
}
