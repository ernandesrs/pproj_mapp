<?php

namespace App\Livewire\Admin\Users;

use App\Livewire\Admin\PageBases\PageEditBase;
use App\Models\User;
use App\Services\UserService;
use Livewire\WithFileUploads;

class Edit extends PageEditBase
{
    use WithFileUploads;

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

    function updateAvatar()
    {
        $this->authorize('update', $this->user);

        $validated = $this->validate(UserService::getPhotoDataRules());

        UserService::updatePhoto($this->user, $validated['data']['avatar']);

        $this->redirect(route('admin.users.edit', ['user' => $this->user->id]), true);
    }

    function deleteAvatar()
    {
        $this->authorize('update', $this->user);

        UserService::deletePhoto($this->user);

        $this->redirect(route('admin.users.edit', ['user' => $this->user->id]), true);
    }

    function clearAvatar()
    {
        $this->data['avatar'] = null;
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
