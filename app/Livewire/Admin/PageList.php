<?php

namespace App\Livewire\Admin;

use App\Livewire\Admin\PageBases\PageListBase;
use App\Models\User;

class PageList extends PageListBase
{
    public $modelClass = User::class;

    function searchableFields()
    {
        return ['first_name', 'last_name', 'username', 'email'];
    }

    public function setPageTitle()
    {
        return __('admin/layout.users');
    }

    public function setPageBreadcrumbs()
    {
        return [
            [
                'label' => __('admin/layout.users'),
                'href' => '#',
                'disabled' => true
            ],
        ];
    }

    public function setPageActions()
    {
        return [
            [
                'text' => 'New item',
                'icon' => 'plus-lg',
                'href' => '#'
            ],
            [
                'text' => 'Dolorem',
                'icon' => 'arrow-right',
                'href' => '#'
            ]
        ];
    }

    function tableColumnData()
    {
        return [
            [
                'label' => __('admin/worlds.name'),
                'key' => ['first_name', 'last_name'],
            ],
            [
                'label' => __('admin/worlds.username'),
                'key' => 'username',
            ],
            [
                'label' => __('admin/worlds.email'),
                'key' => 'email',
            ],
            [
                'label' => __('admin/worlds.create_date'),
                'key' => 'created_at',
            ]
        ];
    }

    function actionShow()
    {
        return 'null';
    }

    function actionEdit()
    {
        return null;
    }

    function actionDelete()
    {
        return true;
    }
}
