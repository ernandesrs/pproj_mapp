<?php

namespace App\Livewire\Admin\Roles;

use App\Livewire\Admin\PageBases\PageEditBase;
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

    function mount(...$role)
    {
        $this->model = $this->role = Role::where('id', $role)->firstOrFail();

        return parent::mount();
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
