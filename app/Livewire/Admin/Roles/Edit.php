<?php

namespace App\Livewire\Admin\Roles;

use App\Livewire\Admin\PageBases\PageEditBase;
use App\Models\Permission;
use App\Models\Role;

class Edit extends PageEditBase
{
    public $viewContent = 'roles.edit';

    /**
     * Role
     *
     * @var Role
     */
    public $role = null;

    public $permissions = null;

    function mount(...$role)
    {
        $this->model = $this->role = Role::where('id', $role)->firstOrFail();

        if (!$this->model->isSuper()) {
            $this->permissions = Permission::all();
        }

        return parent::mount();
    }

    /**
     * Rules
     *
     * @return array
     */
    function rules()
    {
        return [
            'data.name' => ['required', 'max:255']
        ];
    }

    /**
     * Assing permission to current role
     *
     * @param Permission $permission
     * @return void
     */
    function assignRevokePermissionToRole(Permission $permission)
    {
        $this->authorize('update', $this->role);

        if ($this->role->hasPermissionTo($permission)) {
            $this->role->revokePermissionTo($permission);
        } else {
            $this->role->givePermissionTo($permission);
        }
    }

    function setPageActions()
    {
        return [];
    }

    function setPageBreadcrumbs()
    {
        return [
            [
                'label' => __('admin/worlds.roles'),
                'href' => route('admin.roles.index')
            ],
            [
                'label' => __('admin/worlds.edit'),
                'href' => route('admin.roles.edit', ['role' => $this->role->id]),
                'disabled' => true
            ]
        ];
    }

    function setPageTitle()
    {
        return __('admin/worlds.edit');
    }

    function showRouteName()
    {
        return null;
    }
}
