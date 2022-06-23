<?php

namespace App\Console\Commands;

use App\Models\Administrator;
use App\Traits\HasRightsTrait;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SyncPermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:permissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync the permissions with the database.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Create permission
        $this->checkAndCreatePermissions($this->getPermissions());
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

    /**
     * Check if permissions are still relevant;
     *  if not delete those ( that is if the administrator agreed to this )
     *
     * @param $groupedPermissions
     * @return array
     */
    protected function checkAndCreatePermissions($groupedPermissions)
    {
        // Get permission id's
        $relevantPermissionIDs = [];

        // Create permission
        foreach ($groupedPermissions as $permissionGroup => $permissions) {
            // Grouped permission; $permissionGroup (example: dashboard, administrator)
            foreach ($permissions as $permission) {
                // Single permission; $permission (examples: index, add, edit)
                $relevantPermissionIDs[] = Permission::updateOrCreate(['name' => $permissionGroup . '.' . $permission], ['name' => $permissionGroup . '.' . $permission]);
            }
        }

        // Check relevant permissions
        $differences = array_diff(Permission::all()->pluck('name')->toArray(), Arr::pluck($relevantPermissionIDs, 'name'));

        foreach ($differences as $difference) {
            Permission::where(['name' => $difference])->delete();
        }

        $this->info('Permissions were synced succesfully!');

        // Return permission id's
        return $relevantPermissionIDs;
    }
}
