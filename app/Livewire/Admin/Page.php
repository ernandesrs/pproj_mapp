<?php

namespace App\Livewire\Admin;

use App\Livewire\Admin\PageBases\PageBaseSimple;

class Page extends PageBaseSimple
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
