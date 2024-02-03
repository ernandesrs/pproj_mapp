<?php

namespace App\Livewire\Admin;

use App\Livewire\Admin\PageBases\PageBase;

class Page extends PageBase
{
    public $viewContent = 'page';

    function setPageTitle()
    {
        return 'Page example';
    }

    function setPageBreadcrumbs()
    {
        return [
            [
                'label' => 'Page example',
                'href' => route('admin.page')
            ]
        ];
    }

    function setPageActions()
    {
        return [];
    }
}
