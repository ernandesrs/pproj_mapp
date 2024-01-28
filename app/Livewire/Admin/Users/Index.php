<?php

namespace App\Livewire\Admin\Users;

use App\Livewire\Helpers\Traits\AsListPage;
use Livewire\Component;

class Index extends Component
{
    use AsListPage;

    public function render()
    {
        return view('livewire..admin.users.index')
            ->layout('livewire.admin.layout')
            ->title($this->getLayoutTitle());
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
