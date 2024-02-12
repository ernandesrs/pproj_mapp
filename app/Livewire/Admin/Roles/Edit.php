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
            $this->alert()->info(__('admin/alerts.success_on_revoke_permission'))->alertify();
        } else {
            $this->role->givePermissionTo($permission);
            $this->alert()->info(__('admin/alerts.success_on_assign_permission'))->alertify();
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
                'label' => __('admin/words.roles'),
                'href' => route('admin.roles.index')
            ],
            [
                'label' => __('admin/words.edit'),
                'href' => route('admin.roles.edit', ['role' => $this->role->id]),
                'disabled' => true
            ]
        ];
    }

    function setPageTitle()
    {
        return __('admin/words.edit');
    }

    function showRouteName()
    {
        return null;
    }
}
