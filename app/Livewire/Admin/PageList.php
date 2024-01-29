<?php

namespace App\Livewire\Admin;

use App\Livewire\Helpers\Traits\AsListPage;
use Livewire\Component;
use Livewire\WithPagination;

class PageList extends Component
{
    use WithPagination, AsListPage;

    public function render()
    {
        return view('livewire..admin.page-list')
            ->layout('livewire.admin.layout')->title($this->getLayoutTitle());
    }

    public function searchableFields()
    {
        return [];
    }

    public function getModelClass()
    {
        return \App\Models\User::class;
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
