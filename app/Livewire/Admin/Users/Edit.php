<?php

namespace App\Livewire\Admin\Users;

use App\Livewire\Admin\PageBases\PageEditBase;
use App\Models\User;
use Illuminate\Validation\Rule;

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
            'data.gender' => ['required', Rule::in(['n', 'm', 'f'])],
            'data.password' => ['nullable', 'confirmed', 'max:255'],
        ];
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
        return null;
    }

    function editRouteName()
    {
        return 'admin.users.edit';
    }
}
