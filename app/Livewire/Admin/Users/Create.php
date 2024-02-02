<?php

namespace App\Livewire\Admin\Users;

use App\Livewire\Admin\PageBases\PageCreateBase;
use App\Models\User;
use Illuminate\Validation\Rule;

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

    /**
     * Rules
     *
     * @return array
     */
    function rules()
    {
        return [
            'data.first_name' => ['required', 'max:25'],
            'data.last_name' => ['required', 'max:50'],
            'data.username' => ['required', 'max:25'],
            'data.email' => ['required', 'unique:users,email', 'max:255'],
            'data.gender' => ['required', Rule::in(['n', 'm', 'f'])],
            'data.password' => ['required', 'confirmed', 'max:255'],
        ];
    }
}
