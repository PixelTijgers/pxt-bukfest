<?php

// Namespacing.
namespace app\Http\ViewComposers;

// Facades.
use App\Traits\HasRightsTrait;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\View\Engines\CompilerEngine;
use Illuminate\View\View;

use App\Repositories\UserRepository;
use Spatie\Permission\Models\Permission;

class SyncPermissionsViewComposer
{
    public function compose(View $view)
    {
        $view->with('permissions', $this->getPermissions());
    }

    /**
     * Get permissions from route
     *
     * @return array
     */
    protected function getPermissions()
    {
        // Variable to save routes
        $routes = [];

        // Loop Controllers for usable permissions
        foreach (\Route::getRoutes() as $route) {

            // Check route permissions
            // Check route permissions
            if ($routePermissions = $this->checkRoutePermissions($route)) {
                // Add permission to routes
                $routes[$routePermissions['routeName']][] = $routePermissions['permissionMapping'];

                // Remove dupes
                $routes[$routePermissions['routeName']] = array_unique($routes[$routePermissions['routeName']]);
            }
        }

        //
        return $routes;
    }

    /**
     *
     *
     * @param $route
     * @return array|void
     */
    protected function checkRoutePermissions($route)
    {
        // Get route name.
        $actionName = $route->getActionName();
        $classDotted = strtolower(str_replace('\\', '.', explode('@', $actionName)[0]));
        $routeName = implode('.', array_slice(explode('.', $classDotted), 3));

        // Remove 'controller' from string
        if (Str::endsWith($routeName, 'controller')) {
            $routeName = substr($routeName, 0, -10);
        }

        // Abort due to only admin habitat is supported at this moment?
        if (explode('.', $routeName)[0] != 'admin') {
            return;
        }

        // Remove habitat from route name.
        $routeName = implode('.', array_slice(explode('.', $routeName), 1));

        // Abort due to no controller (action)?
        if (!$controllerMethod = @explode('@', $actionName)[1]) {
            return;
        }

        // Get controller.
        $controller = $route->getController();

        // Abort due to no HasRights used?
        if (!in_array(HasRightsTrait::class, class_uses_recursive(get_class($controller)))) {
            return;
        }

        // Get permission mapping.
        $permissionMapping = $controller->getPermissionMapping();

        // Skip due to ignored method?
        if (@$permissionMapping[$controllerMethod] === false) {
            return;
        }

        //
        return [
            'routeName' => $routeName,
            'permissionMapping' => $permissionMapping[$controllerMethod] ?? $controllerMethod
        ];
    }
}
