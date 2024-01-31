<?php

namespace App\Livewire\Admin;

use App\Livewire\Admin\Pages\PageListBase;
use App\Models\User;

class PageList extends PageListBase
{
    public $modelClass = User::class;

    public function getPageTitle()
    {
        return __('admin/layout.users');
    }

    public function getPageBreadcrumbs()
    {
        return [
            [
                'label' => __('admin/layout.users'),
                'href' => '#',
                'disabled' => true
            ],
        ];
    }

    public function getPageActions()
    {
        return [
            [
                'text' => 'New item',
                'icon' => 'plus-lg',
                'href' => '#'
            ],
            [
                'text' => 'Dolorem',
                'icon' => 'arrow-right',
                'href' => '#'
            ]
        ];
    }
}
