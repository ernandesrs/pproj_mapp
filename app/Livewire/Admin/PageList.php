<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class PageList extends Component
{
    public function render()
    {
        return view('livewire..admin.page-list', [
            'title' => 'Page list',
            'breadcrumbs' => [
                [
                    'label' => 'Page list',
                    'href' => '#',
                    'disabled' => true
                ]
            ],
            'list' => \App\Models\User::query()->paginate(15)
        ])->layout('livewire.admin.layout');
    }
}
