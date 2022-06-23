<?php

namespace App\Traits;

trait HasRightsTrait
{
    /**
     * Custom permissions
     */
    protected $permissions = [];

    /**
     * Contains all right groups
     *
     * Can be changed for every Controller
     */
    protected $permissionMapping = [
        'index' => 'index',
        'show' => 'index',
        'create' => 'add',
        'store' => 'add',
        'edit' => 'edit',
        'update' => 'edit',
        'destroy' => 'destroy',
        'export' => 'export',
        'order' => 'order'
    ];

    /**
     * Function to retrieve all function rights
     */
    public function getCustomPermissions()
    {
        return $this->permissions;
    }

    /**
     * Function to retrieve all function right groups
     */
    public function getPermissionMapping()
    {
        return $this->permissionMapping;
    }
}
