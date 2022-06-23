<?php

namespace App\Traits;

use phpDocumentor\Reflection\Types\Collection;

trait DataTableActionsTrait
{
    /**
     * Generate the actions buttons for the dataTables.
     *
     * @param collection $model
     * @param string $action
     * @param string $route
     * @param bool $visible
     * @return string
     */

    protected function setAction($permission, $model, string $action, string $route, $visible = true)
    {
        if($action == 'view' && $visible === true)
            return $this->viewAction($permission, $model, $route);
        elseif($action == 'update'  && $visible === true)
            return $this->editAction($permission, $model, $route);
        elseif($action == 'destroy'  && $visible === true)
            return $this->deleteAction($permission, $model, $route);
        else
            return false;
    }

    protected function viewAction($permission, $model, $route)
    {
        if (auth()->user()->can('modules.' . $permission)) {
            return '
                <a href="' . url('/admin/modules/' . $route . '/' . $model->id) . '" class="btn btn-success btn-icon mr-2">
                    <i class="far fa-eye"></i>
                </a>';
        }
    }

    protected function editAction($permission, $model, $route)
    {
        if (auth()->user()->can('modules.' . $permission)) {
            return
                '<a href="' . url('/admin/modules/' . $route . '/' . $model->id . '/edit') . '" class="btn btn-warning btn-icon mr-2">
                    <i class="far fa-pencil"></i>
                </a>';
        }
    }

    protected function deleteAction($permission, $model, $route)
    {
        if (auth()->user()->can('modules.' . $permission)) {
            return '
                <form class="delete-item-form" method="POST" action="/admin/modules/' . $route . '/' . $model->id . '">
                    ' . csrf_field() . '
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger btn-icon"><i class="fas fa-trash"></i></button>
                </form>';
        }
    }
}
