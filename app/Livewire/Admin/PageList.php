<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;

class PageList extends Component
{
    use WithPagination;

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
            'list' => \App\Models\User::query()->paginate(15),
            'actions' => [
                [
                    'text' => 'New item',
                    'icon' => 'plus-lg',
                    'href' => '#'
                ],
                [
                    'text' => 'Lorem sit',
                    'icon' => 'arrow-up',
                    'href' => '#'
                ]
            ]
        ])->layout('livewire.admin.layout');
    }
}
