<?php

namespace App\Livewire\Admin\Account;

use App\Livewire\Admin\PageBases\PageBase;
use App\Services\UserService;
use Livewire\WithFileUploads;

class Me extends PageBase
{
    use WithFileUploads;

    public $viewContent = 'account.me';

    public $uncontained = true;

    /**
     * Me data
     *
     * @var array
     */
    public $data = [];

    function mount(...$vars)
    {
        $this->data = \Auth::user()->toArray();

        return parent::mount();
    }

    function updateAvatar()
    {
        $validated = $this->validate(UserService::getPhotoDataRules());

        UserService::updatePhoto(\Auth::user(), $validated['data']['avatar']);

        $this->alert()->info(__('admin/alerts.success_on_update'))->alertify();

        $this->clearAvatar();
    }

    function clearAvatar()
    {
        $this->data['avatar'] = null;
    }

    function deleteAvatar()
    {
        UserService::deletePhoto(\Auth::user());

        $this->alert()->info(__('admin/alerts.success_on_delete'))->flash();

        $this->redirect(route('admin.profile'), true);
    }

    function updateData()
    {
        $validated = $this->validate(UserService::getBasicDataRules());

        UserService::update(\Auth::user(), $validated['data']);

        $this->alert()->success(__('admin/alerts.success_on_update'))->alertify();
    }

    function updatePassword()
    {
        $validated = $this->validate(UserService::getPasswordDataRules());

        UserService::updatePassword(\Auth::user(), $validated['data']);

        $this->alert()->success(__('admin/alerts.success_on_update'))->flash();

        $this->redirect(route('admin.profile'), true);
    }

    function setPageActions()
    {
        return [];
    }

    function setPageBreadcrumbs()
    {
        return [
            [
                'label' => __('admin/layout.profile'),
                'href' => '#',
                'disabled' => true
            ]
        ];
    }

    function setPageCreateAction()
    {
        return null;
    }

    function setPageTitle()
    {
        return __('admin/layout.profile');
    }
}
