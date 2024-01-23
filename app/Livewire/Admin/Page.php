<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Page extends Component
{
    public function render()
    {
        return view('livewire..admin.page', [
            'title' => 'Page example',
            'breadcrumbs' => [
                [
                    'label' => 'Page',
                    'href' => '#',
                    'disabled' => true
                ]
            ]
        ])
            ->layout('livewire.admin.layout');
    }
}
