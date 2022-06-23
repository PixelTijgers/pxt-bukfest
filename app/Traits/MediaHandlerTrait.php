<?php

namespace App\Traits;

trait MediaHandlerTrait
{
    protected function manageInputMedia($model, $name)
    {
        // Check if media is empty or not.
        if (request()->{$name} == null) {
            // Delete media?
            $model->clearMediaCollection($name);
        }
        elseif (request()->{$name}) {
            // Save media.
            $model->addMedia(request()->{$name})->toMediaCollection($name);
        }
    }
}
