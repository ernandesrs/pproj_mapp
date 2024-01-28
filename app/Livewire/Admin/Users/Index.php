<?php

namespace App\Livewire\Admin\Users;

use App\Livewire\Helpers\Traits\AsPage;
use Livewire\Component;

class Index extends Component
{
    use AsPage;

    public function render()
    {
        return view('livewire..admin.users.index', [
            'title' => $this->getPageTitle(),
            'breadcrumbs' => $this->getPageBreadcrumbs(),
            'list' => \App\Models\User::query()->paginate(15),
            'actions' => $this->getPageActions()
        ])->layout('livewire.admin.layout');
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
            ]
        ];
    }

    public function getPageActions()
    {
        return [
            [
                'text' => 'New user',
                'icon' => 'plus-lg',
                'href' => '#'
            ]
        ];
    }
}
