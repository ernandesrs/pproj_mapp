<?php

namespace App\Livewire\Admin\Users;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire..admin.users.index', [
            'title' => __('admin/layout.users'),
            'breadcrumbs' => [
                [
                    'label' => __('admin/layout.users'),
                    'href' => '#',
                    'disabled' => true
                ]
            ],
            'list' => \App\Models\User::query()->paginate(15),
            'actions' => [
                [
                    'text' => 'New user',
                    'icon' => 'plus-lg',
                    'href' => '#'
                ]
            ]
        ])->layout('livewire.admin.layout');
    }
}
