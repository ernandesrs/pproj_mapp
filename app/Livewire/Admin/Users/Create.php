<?php

namespace App\Livewire\Admin\Users;

use App\Livewire\Admin\PageBases\PageCreateBase;
use App\Models\User;
use App\Services\UserService;

class Create extends PageCreateBase
{
    public $viewContent = 'users.create';

    public $modelClass = User::class;

    public $modelService = UserService::class;

    /**
     * Rules
     *
     * @return array
     */
    function rules()
    {
        return UserService::getCreateDataRules();
    }

    function setPageActions()
    {
        return [];
    }

    function setPageBreadcrumbs()
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

    function setPageTitle()
    {
        return __('admin/worlds.new') . ' ' . __('admin/worlds.user');
    }

    function showRouteName()
    {
        return null;
    }
}
