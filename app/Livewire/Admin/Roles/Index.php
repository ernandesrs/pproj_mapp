<?php

namespace App\Livewire\Admin\Roles;

use App\Livewire\Admin\PageBases\PageListBase;
use App\Models\Role;

class Index extends PageListBase
{
    public $modelClass = Role::class;

    function tableColumnData()
    {
        return [
            [
                'label' => __('admin/worlds.name'),
                'key' => ['name']
            ]
        ];
    }

    function searchableFields()
    {
        return ['name'];
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
                'href' => route('admin.roles.index'),
                'disabled' => true
            ]
        ];
    }

    function setPageTitle()
    {
        return __('admin/worlds.roles');
    }

    function showRouteName()
    {
        return null;
    }

    function actionDelete()
    {
        return true;
    }
}
