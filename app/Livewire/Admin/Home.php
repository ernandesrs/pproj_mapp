<?php

namespace App\Livewire\Admin;

use App\Livewire\Admin\PageBases\PageBase;

class Home extends PageBase
{
    public $viewContent = 'home';

    public $uncontained = true;

    function getPageTitle()
    {
        return null;
    }

    function getLayoutTitle()
    {
        return __('admin/layout.overview');
    }

    function getPageBreadcrumbs()
    {
        return [];
    }

    function getPageActions()
    {
        return [];
    }
}
