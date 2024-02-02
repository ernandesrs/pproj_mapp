<?php

namespace App\Livewire\Admin\Users;

use App\Livewire\Admin\PageBases\PageEditBase;
use App\Models\User;

class Edit extends PageEditBase
{
    public $viewContent = 'users.edit';

    /**
     * User
     *
     * @var User
     */
    public $user = null;

    function mount(...$user)
    {
        $this->model = $this->user = User::where('id', $user)->firstOrFail();

        return parent::mount();
    }

    function getPageActions()
    {
        return [
            [
                'text' => __('admin/worlds.new') . ' ' . __('admin/worlds.user'),
                'href' => route('admin.users.create'),
                'icon' => 'plus-lg'
            ]
        ];
    }

    function getPageBreadcrumbs()
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

    function getPageTitle()
    {
        return __('admin/worlds.edit') . ' ' . __('admin/worlds.user');
    }
}
