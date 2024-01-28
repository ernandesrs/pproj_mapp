<?php

namespace App\Livewire\Admin;

use App\Livewire\Helpers\Traits\AsPage;
use Livewire\Component;
use Livewire\WithPagination;

class PageList extends Component
{
    use WithPagination, AsPage;

    public function render()
    {
        return view('livewire..admin.page-list', [
            'list' => \App\Models\User::query()->paginate(15)
        ])->layout('livewire.admin.layout')->title($this->getLayoutTitle());
    }

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
