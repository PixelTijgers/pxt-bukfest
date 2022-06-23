<?php

// Controller namespacing.
namespace App\Http\Controllers\Admin\Modules;
use App\Http\Controllers\Controller;

// Facades.

// Models.
use App\Models\Social;

// Request
use Illuminate\Http\Request;
use App\Http\Requests\SocialRequest;

// Traits
use App\Traits\HasRightsTrait;
use App\Traits\SortableTrait;

class SocialController extends Controller
{
    /**
     * Traits
     *
     */
    use HasRightsTrait,
        SortableTrait;

    /**
     * Update the ranks in the database
     *
     * @return mixed
     */
    public function updateSortable(Request $request)
    {
        $this->updatePosition(Social::all(), $request);

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
        $socials = Social::all()->sortBy('_lft');

        // Init view.
        return view('admin.modules.social.index', compact('socials'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SocialRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Init view.
        return view('admin.modules.social.createEdit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $social
     * @return \Illuminate\Http\Response
     */
    public function store(SocialRequest $request)
    {

        // Post data to database.
        $social = Social::Create($request->validated());

        // Return back with message.
        return redirect()->route('social.index')->with([
                'type' => 'success',
                'message' => __('Alert Add')
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $social
     * @return \Illuminate\Http\Response
     */
    public function edit(Social $social)
    {
        // Init view.
        return view('admin.modules.social.createEdit', compact('social'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SocialRequest  $request
     * @param  int  $social
     * @return \Illuminate\Http\Response
     */
    public function update(SocialRequest $request, Social $social)
    {
        // Set data to save into database.
        $social->update($request->validated());

        // Save data.
        $social->save();

        // Return back with message.
        return redirect()->route('social.index')->with([
                'type' => 'success',
                'message' => __('Alert Edit')
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $social
     * @return \Illuminate\Http\Response
     */
    public function destroy(Social $social)
    {
        // @UGLY: This assures me that only 1 record will be removed.
        // Delete the model.
        Social::where('id', $social->id)->delete();

        // Return back with message.
        return redirect()->back()->with([
            'type' => 'success',
            'message' => __('Alert Delete')
        ]);
    }
}
