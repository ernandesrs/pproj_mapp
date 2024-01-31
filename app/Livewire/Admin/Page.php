<?php

namespace App\Livewire\Admin;

use App\Livewire\Admin\Pages\PageBase;

class Page extends PageBase
{
    public $viewContent = 'page';

    function getPageTitle()
    {
        return 'Page example';
    }

    function getPageBreadcrumbs()
    {
        return [
            [
                'label' => 'Page example',
                'href' => route('admin.page')
            ]
        ];
    }

    function getPageActions()
    {
        return [];
    }
}
