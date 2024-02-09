<?php

namespace App\Livewire\Admin\Account;

use App\Livewire\Admin\PageBases\PageBase;
use App\Services\UserService;

class Me extends PageBase
{
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
        dump('avatar');
    }

    function updateData()
    {
        $validated = $this->validate(UserService::getBasicDataRules());

        UserService::update(\Auth::user(), $validated['data']);
    }

    function updatePassword()
    {
        $validated = $this->validate(UserService::getPasswordDataRules());

        UserService::updatePassword(\Auth::user(), $validated['data']);

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
