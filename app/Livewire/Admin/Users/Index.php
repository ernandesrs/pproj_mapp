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
                'label' => __('admin/words.avatar'),
                'view' => 'livewire.admin.users.avatar'
            ],
            [
                'label' => __('admin/words.details'),
                'view' => 'livewire.admin.users.details'
            ],
            [
                'label' => __('admin/words.username'),
                'key' => 'username'
            ],
            [
                'label' => __('admin/words.roles'),
                'view' => 'livewire.admin.users.roles'
            ],
            [
                'label' => __('admin/words.create_date'),
                'key' => 'created_at',
                'type' => 'date'
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

    function showRouteName()
    {
        return null;
    }

    function actionDelete()
    {
        return true;
    }
}
