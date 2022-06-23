<?php

// Controller namespacing.
namespace App\Http\Controllers\Admin\Modules;
use App\Http\Controllers\Controller;

// Facades.

// Models.
use App\Models\Sponsor;

// Request
use Illuminate\Http\Request;
use App\Http\Requests\SponsorRequest;

// Traits
use App\Traits\HasRightsTrait;
use App\Traits\MediaHandlerTrait;
use App\Traits\SortableTrait;

class SponsorController extends Controller
{
    /**
     * Traits
     *
     */
    use HasRightsTrait,
        MediaHandlerTrait,
        SortableTrait;

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
     * Update the ranks in the database
     *
     * @return mixed
     */
    public function updateSortable(Request $request)
    {
        $this->updatePosition(Sponsor::all(), $request);

        return response()->json('Volgorde met succes opgeslagen', 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all the social media links.
        $sponsors = Sponsor::all()->sortBy('_lft');

        // Init view.
        return view('admin.modules.sponsor.index', compact('sponsors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Init view.
        return view('admin.modules.sponsor.createEdit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SponsorRequest $request)
    {
        // Post data to database.
        $sponsor = Sponsor::Create($request->validated());

        // Page header image.
        $this->processImage($request, $sponsor, 'sponsorImage');

        // Return back with message.
        return redirect()->route('sponsor.index')->with([
                'type' => 'success',
                'message' => __('Alert Add')
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function edit(Sponsor $sponsor)
    {
        // Init view.
        return view('admin.modules.sponsor.createEdit', compact('sponsor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function update(SponsorRequest $request, Sponsor $sponsor)
    {
        // Set data to save into database.
        $sponsor->update($request->validated());

        // Page header image.
        $this->processImage($request, $sponsor, 'sponsorImage');

        // Save data.
        $sponsor->save();

        // Return back with message.
        return redirect()->route('sponsor.index')->with([
                'type' => 'success',
                'message' => __('Alert Edit')
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sponsor $sponsor)
    {
        // Delete the model.
        $sponsor->delete();

        // Return back with message.
        return redirect()->back()->with([
            'type' => 'success',
            'message' => __('Alert Delete')
        ]);
    }
}
