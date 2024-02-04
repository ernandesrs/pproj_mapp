<?php

namespace App\Livewire\Admin\Roles;

use App\Livewire\Admin\PageBases\PageCreateBase;
use App\Models\Role;

class Create extends PageCreateBase
{
    public $viewContent = 'roles.create';

    public $modelClass = Role::class;

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
                'label' => __('admin/worlds.new'),
                'href' => route('admin.roles.create'),
                'disabled' => true
            ]
        ];
    }

    function setPageTitle()
    {
        return __('admin/worlds.new') . ' ' . __('admin/worlds.role');
    }

    function showRouteName()
    {
        return null;
    }

}
