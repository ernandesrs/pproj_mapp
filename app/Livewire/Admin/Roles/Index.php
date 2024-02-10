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
                'label' => __('admin/words.name'),
                'key' => ['name']
            ],
            [
                'label' => __('admin/words.users') . ' ' . strtolower(__('admin/words.linkeds')),
                'view' => 'livewire.admin.roles.count'
            ],
            [
                'label' => __('admin/words.create_date'),
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
                'label' => __('admin/words.roles'),
                'href' => route('admin.roles.index'),
                'disabled' => true
            ]
        ];
    }

    function setPageTitle()
    {
        return __('admin/words.roles');
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
