<?php

// Namespacing.
namespace app\Http\ViewComposers;

// Facades.
use Illuminate\View\View;
use Illuminate\Database\Eloquent\ModelNotFoundException;

// Models.
use App\Models\Page;

class PageViewComposer
{
    public function compose(View $view)
    {
        // Return view variable.
        $view->with('page', $this->getPage());
    }

    /**
     * Return the namespace for the blade view file.
     *
     * @return string
     */
    protected function getPage()
    {
        // Get the path.
        $getPath = (request()->path() != '/' ? '/' . request()->path() :  request()->path());

        // Check if the current page exists. Else throw an error and redirect to the 404 page.
        return Page::where('slug', $getPath)->first();
    }
}
