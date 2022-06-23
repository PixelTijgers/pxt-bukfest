<?php

namespace App\Traits;

trait SortableTrait
{
    protected function updatePosition($model, $request)
    {
        foreach ($model as $row) {
            $row->timestamps = false; // To disable update_at field updation

            foreach ($request->sortableOrder as $sortableOrder) {
                if ($sortableOrder['id'] == $row->id) {
                    $row->update(['_lft' => $sortableOrder['position']]);
                }
            }
        }
    }
}
