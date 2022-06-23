<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Auth\Factory as Auth;

use App\Traits\HasRightsTrait;

class AdminPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string[] ...$guards
     * @return mixed
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    public function handle($request, Closure $next)
    {
        // Administrator is logged in?
        if (auth()->check()) {
            // Is role admin?
            if (auth()->user()->hasRole('superadmin')) {
                return $next($request);
            }

            // Check permissions
            return $this->hasRights($request, $next);
        } // Redirect to login?
        else {
            return redirect('login');
        }
    }

    protected function hasRights($request, $next)
    {
        // Get current controller
        $controllerName = \Str::before(\Route::getCurrentRoute()->action['controller'], '@');
        $controller = new $controllerName;

        // Check if controller uses HasRights trait
        if (in_array(HasRightsTrait::class, class_uses($controller))) {
            return $this->hasPermission($request, $next);
        } else {
            return $next($request);
        }
    }

    protected function hasPermission($request, $next)
    {
        // Get permission
        $permission = strtolower(\Str::after(str_replace('Controller@', '.', \Route::getCurrentRoute()->action['controller']), 'Admin\\'));

        // Get grouped user rights
        $permissionMapping = \Route::getCurrentRoute()->controller->getPermissionMapping();

        // Get action.
        $permIndex = strtolower(explode('.', $permission)[1]);

        // Replace group right due to given in Controller?
        $newPermission = str_replace(['\\', ($permIndex = \Arr::last(explode('.', $permission)))], ['.', @$permissionMapping[$permIndex] ?: $permIndex], $permission);

        // Proceed due to having permission?
        if (@auth()->user()->can($newPermission)) {
            return $next($request);
        }

        // No access?
        else {
            abort(403, "Forbidden - Administrator doesn't have permission");
        }
    }
}
