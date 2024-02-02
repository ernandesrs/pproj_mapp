<?php

namespace App\Livewire\Admin\Users;

use App\Livewire\Admin\PageBases\PageCreateBase;
use App\Models\User;

class Create extends PageCreateBase
{
    public $viewContent = 'users.create';

    public $modelClass = User::class;

    function getPageActions()
    {
        return [];
    }

    function getPageBreadcrumbs()
    {
        return [
            [
                'label' => __('admin/layout.users'),
                'href' => route('admin.users.index')
            ],
            [
                'label' => __('admin/worlds.new'),
                'href' => route('admin.users.create'),
                'disabled' => true
            ]
        ];
    }

    function getPageTitle()
    {
        return __('admin/worlds.new') . ' ' . __('admin/worlds.user');
    }
}
