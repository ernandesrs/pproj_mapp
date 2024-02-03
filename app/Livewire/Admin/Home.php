<?php

namespace App\Livewire\Admin;

use App\Livewire\Admin\PageBases\PageBase;

class Home extends PageBase
{
    public $viewContent = 'home';

    public $uncontained = true;

    function setPageTitle()
    {
        return null;
    }

    function getLayoutTitle()
    {
        return __('admin/layout.overview');
    }

    function setPageBreadcrumbs()
    {
        return [];
    }

    function setPageActions()
    {
        return [];
    }
}
