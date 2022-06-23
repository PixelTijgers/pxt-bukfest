<?php

// Controller namespacing.
namespace App\Http\Controllers\Admin\Modules;
use App\Http\Controllers\Controller;

// Models.
use App\Models\Detail;

// Request
use App\Http\Requests\DetailRequest;

// Traits
use App\Traits\HasRightsTrait;

class DetailController extends Controller
{
    /**
     * Traits
     *
     */
    use HasRightsTrait;

     /**
      * Show the form for editing the specified resource.
      *
      * @param  \App\Models\Detail  $detail
      * @return \Illuminate\Http\Response
      */
     public function edit(Detail $detail)
     {
         // Init view.
         return view('admin.modules.detail.createEdit', compact('detail'));
     }

     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \App\Models\Detail  $detail
      * @return \Illuminate\Http\Response
      */
     public function update(DetailRequest $request, Detail $detail)
     {
         // Set data to save into database.
         $detail->update($request->validated());

         // Save data.
         $detail->save();

         // Return back with message.
         return redirect()->route('dashboard')->with([
                 'type' => 'success',
                 'message' => __('Item Edit')
             ]
         );
     }
}
