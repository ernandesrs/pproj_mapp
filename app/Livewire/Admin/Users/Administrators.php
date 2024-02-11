<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;

class Administrators extends Index
{
    function getModelInstance(?int $id = null)
    {
        return User::permission(\App\Enums\Admin\Permissions\UserPermissionsEnum::ADMIN_ACCESS->value);
    }

    function setPageActions()
    {
        return [
            [
                'text' => __('admin/layout.all') . ' ' . strtolower(__('admin/words.users')),
                'href' => route('admin.users.index'),
                'icon' => 'arrow-left'
            ]
        ];
    }

    function setPageBreadcrumbs()
    {
        return [
            [
                'label' => __('admin/layout.administrators'),
                'href' => route('admin.users.administrators'),
                'disabled' => true
            ]
        ];
    }

    function setPageTitle()
    {
        return __('admin/layout.administrators');
    }
}
