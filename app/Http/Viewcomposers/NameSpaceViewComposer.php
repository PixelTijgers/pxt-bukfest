<?php

// Namespacing.
namespace app\Http\ViewComposers;

// Facades.
use Illuminate\View\View;

class NameSpaceViewComposer
{
    public function compose(View $view)
    {
        // Return view variable.
        $view->with('cssNs', $this->getCssClass($view));
    }

    /**
     * Return the namespace for the blade view file.
     *
     * @return string
     */
    protected function getCssClass(View $view)
    {
        // Strip the view file path and replace it with dash(es).
        $cssNsName = str_replace(['.', '/'], '-', $view->getName());

        // Explode the string and capitalize the last word.
        $explodeCssNs = explode('-', $cssNsName);
        $lastElementToUpper = \Str::ucfirst(\Arr::last($explodeCssNs));

        // Return the cssNs class to the blade view file.
        return ltrim(implode('-', array_slice($explodeCssNs, 0, -1)) . '-' . $lastElementToUpper);

    }
}
