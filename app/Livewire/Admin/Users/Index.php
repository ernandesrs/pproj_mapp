<?php

namespace App\Livewire\Admin\Users;

use App\Livewire\Admin\PageBases\PageListBase;
use App\Models\User;

class Index extends PageListBase
{
    public $modelClass = User::class;

    function tableColumnData()
    {
        return [
            [
                'label' => __('admin/layout.users'),
                'key' => ['first_name', 'last_name']
            ],
            [
                'label' => __('admin/worlds.username'),
                'key' => 'username'
            ],
            [
                'label' => __('admin/worlds.email'),
                'key' => 'email'
            ],
            [
                'label' => __('admin/worlds.create_date'),
                'key' => 'created_at'
            ]
        ];
    }

    function searchableFields()
    {
        return ['first_name', 'last_name', 'username', 'email'];
    }

    function setPageActions()
    {
        return [
            [
                'text' => __('admin/worlds.new') . ' ' . __('admin/worlds.user'),
                'href' => route('admin.users.create'),
                'icon' => 'plus-lg'
            ]
        ];
    }

    function setPageBreadcrumbs()
    {
        return [
            [
                'label' => __('admin/layout.users'),
                'href' => route('admin.users.index'),
                'disabled' => true
            ]
        ];
    }

    function setPageTitle()
    {
        return __('admin/layout.users');
    }

    function actionEdit()
    {
        return 'admin.users.edit';
    }

    function actionDelete()
    {
        return true;
    }
}
