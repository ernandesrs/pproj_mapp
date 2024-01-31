<?php

namespace App\Livewire\Admin;

use App\Livewire\Admin\PageBases\PageListBase;
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

    function tableColumnData()
    {
        return [
            [
                'label' => __('admin/worlds.name'),
                'callback' => fn($item) => $item->first_name . ' ' . $item->last_name,
            ],
            [
                'label' => __('admin/worlds.username'),
                'callback' => fn($item) => $item->username,
            ],
            [
                'label' => __('admin/worlds.email'),
                'callback' => fn($item) => $item->email,
            ],
            [
                'label' => __('admin/worlds.create_date'),
                'callback' => fn($item) => $item->created_at,
            ]
        ];
    }
}
