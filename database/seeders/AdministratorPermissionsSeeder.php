<?php

// Namespacing.
namespace Database\Seeders;

// Facades.
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

// Spatie Media.
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

// Traits.
use App\Traits\HasRightsTrait;

// Models.
use App\Models\Administrator;

class AdministratorPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Re-use (old & direct) permissions
        $currentPermissions = $this->getDirectPermissions();

        // Get all (module) permissions
        $groupedPermissions = $this->getPermissions();

        // Create permission
        $this->checkAndCreatePermissions($groupedPermissions);

        // Create roles (and give standard permissions)
        $this->createRoles($groupedPermissions);

        // Give permissions to administrator
        $this->syncDirectAdministratorPermissions($currentPermissions);
    }

    /**
     * Get the permissions directly linked to the administrator
     *
     * @return array
     */
    protected function getDirectPermissions()
    {
        // Administrator permissions
        $administratorPermissions = [];

        // Get administrator permissions
        foreach (Administrator::all() as $administrator) {
            $administratorPermissions[$administrator->id] = $administrator->getDirectPermissions();
        }

        // Return administrator permissions
        return $administratorPermissions;
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

        // Return permission id's
        return $relevantPermissionIDs;
    }

    protected function createRoles($groupedPermissions)
    {
        // Demo permissions.
        $demo = Role::updateOrCreate(['name' => 'demo'], ['name' => 'demo']);

        // User permissions.
        $user = Role::updateOrCreate(['name' => 'user'], ['name' => 'user']);

        // Editor permissions.
        $editor = Role::updateOrCreate(['name' => 'editor'], ['name' => 'editor']);

        // Moderator permissions.
        $moderator = Role::updateOrCreate(['name' => 'moderator'], ['name' => 'moderator']);

        // Admin permissions.
        $administrator = Role::updateOrCreate(['name' => 'administrator'], ['name' => 'administrator']);

        // Superadmin permissions.
        $superadmin = Role::updateOrCreate(['name' => 'superadmin'], ['name' => 'superadmin']);
        $superadmin->givePermissionTo(Permission::all());

        // Give the user superadmin role.
        Administrator::find(1)->assignRole($superadmin);
        Administrator::find(2)->assignRole($demo);
    }

    protected function syncDirectAdministratorPermissions($currentPermissions)
    {
        // $currentPermissions: permissions directly linked to administrators
        foreach ($currentPermissions as $currentAdministrator => $permissions) {
            // Get all relevant and unrelevant permissions
            $relevantPermissions = array_intersect(Arr::pluck($permissions, 'name'), Permission::all()->pluck('name')->toArray());
            $unRelevantPermissions = array_diff(Arr::pluck($permissions, 'name'), Permission::all()->pluck('name')->toArray());

            // Remove unrelevant permissions
            foreach ($unRelevantPermissions as $unRelevantPermission) {
                Administrator::find(['id' => $currentAdministrator])->first()->revokePermissionTo($unRelevantPermission);
            }

            // Sync all administrator permissions (back to the administrator)
            Administrator::find(['id' => $currentAdministrator])->first()->syncPermissions($relevantPermissions);
        }
    }
}
