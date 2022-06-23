<?php

// Namespacing.
namespace app\Http\ViewComposers;

// Facades.
use Illuminate\View\View;

// Models.
use App\Models\NavigationMenu;
use App\Models\Page;

class NavigationMenuViewComposer
{
    public function compose(View $view)
    {
        // Get the navigation menu.
        $navigationMenuPages = $this->getNavigationMenu($view);

        // Return to view with variable.
        $view->with('navigationMenuPages', $navigationMenuPages);
    }

    /**
     * Return the navigation menus.
     *
     * @return mixed
     */
    protected function getNavigationMenu(View $view)
    {
        // Check if view has the navigationMenu variable.
        $navigationMenuView = $view->navigationMenu;

        // Check value of the view variable.
        if(@$navigationMenuView === false)
            // Return false.
            return false;
        elseif($navigationMenuView === null)
            // Return false.
            return false;
        else {
            // Get the navigation menu.
            $navigationMenu = NavigationMenu::where('name', $navigationMenuView)->firstOrFail();

            // Return the selected navigation menu.
            return $this->getNavigationMenuPages($navigationMenu);
        }
    }

    /**
     * Return the navigation menu true.
     *
     * @return mixed
     */
    protected function getNavigationMenuPages(NavigationMenu $navigationMenu)
    {
        // Return the selected navigation menu pages.
        return Page::whereHas('navigation_menus', function($query) use ($navigationMenu) {
            $query->whereId($navigationMenu->id);
        })->orderBy('_lft', 'asc')->get()->toTree();
    }
}
