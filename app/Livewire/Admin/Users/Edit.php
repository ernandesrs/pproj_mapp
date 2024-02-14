<?php

namespace App\Livewire\Admin\Users;

use App\Livewire\Admin\PageBases\PageEditBase;
use App\Models\Role;
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

    public $roles = null;

    public $modelService = UserService::class;

    function mount(...$user)
    {
        $this->model = $this->user = User::where('id', $user)->firstOrFail();
        $this->roles = Role::all();

        return parent::mount();
    }

    /**
     *
     * ROLES
     *
     */

    function assignRole(Role $role)
    {
        $this->authorize('permissionEdit', $this->user);

        $this->user->assignRole($role);

        $this->alert()->info(__('admin/alerts.success_on_assign_role'))->flash();

        $this->redirect(route('admin.users.edit', ['user' => $this->user->id]), true);
    }

    function revokeRole(Role $role)
    {
        $this->authorize('permissionEdit', $this->user);

        $this->user->removeRole($role);

        $this->alert()->info(__('admin/alerts.success_on_revoke_role'))->flash();

        $this->redirect(route('admin.users.edit', ['user' => $this->user->id]), true);
    }

    /**
     *
     * AVATAR
     *
     */

    function updateAvatar()
    {
        $this->authorize('update', $this->user);

        $validated = $this->validate(UserService::getPhotoDataRules());

        UserService::updatePhoto($this->user, $validated['data']['avatar']);

        $this->alert()->info(__('admin/alerts.success_on_update'))->flash();

        $this->redirect(route('admin.users.edit', ['user' => $this->user->id]), true);
    }

    function deleteAvatar()
    {
        $this->authorize('update', $this->user);

        UserService::deletePhoto($this->user);

        $this->alert()->info(__('admin/alerts.success_on_delete'))->flash();

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
                'label' => __('admin/words.edit'),
                'href' => route('admin.users.edit', ['user' => $this->user->id]),
                'disabled' => true
            ]
        ];
    }

    function setPageTitle()
    {
        return __('admin/words.edit') . ' ' . __('admin/words.user');
    }

    function showRouteName()
    {
        return null;
    }
}
