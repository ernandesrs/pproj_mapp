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
                'label' => __('admin/words.name'),
                'key' => ['first_name', 'last_name'],
            ],
            [
                'label' => __('admin/words.username'),
                'key' => 'username',
            ],
            [
                'label' => __('admin/words.email'),
                'key' => 'email',
            ],
            [
                'label' => __('admin/words.create_date'),
                'key' => 'created_at',
            ]
        ];
    }

    function indexRouteName()
    {
        return 'admin.users.index';
    }

    function createRouteName()
    {
        return 'admin.users.create';
    }

    function showRouteName()
    {
        return 'admin.users.show';
    }

    function editRouteName()
    {
        return 'admin.users.edit';
    }

    function actionDelete()
    {
        return true;
    }
}
