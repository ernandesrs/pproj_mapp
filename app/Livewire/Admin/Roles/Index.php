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
            ],
            [
                'label' => __('admin/worlds.users') . ' ' . strtolower(__('admin/worlds.linkeds')),
                'view' => 'livewire.admin.roles.count'
            ],
            [
                'label' => __('admin/worlds.create_date'),
                'key' => ['created_at'],
                'type' => 'date'
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
