<?php

namespace App\Livewire\Admin\Users;

use App\Livewire\Admin\PageBases\PageEditBase;
use App\Models\User;
use App\Services\UserService;

class Edit extends PageEditBase
{
    public $viewContent = 'users.edit';

    public $uncontained = true;

    /**
     * User
     *
     * @var User
     */
    public $user = null;

    public $modelService = UserService::class;

    function mount(...$user)
    {
        $this->model = $this->user = User::where('id', $user)->firstOrFail();

        return parent::mount();
    }

    /**
     * Rules
     *
     * @return array
     */
    function rules()
    {
        return UserService::getBasicDataRules();
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
                'label' => __('admin/worlds.edit'),
                'href' => route('admin.users.edit', ['user' => $this->user->id]),
                'disabled' => true
            ]
        ];
    }

    function setPageTitle()
    {
        return __('admin/worlds.edit') . ' ' . __('admin/worlds.user');
    }

    function showRouteName()
    {
        return null;
    }
}
