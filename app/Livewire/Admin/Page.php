<?php

namespace App\Livewire\Admin;

use App\Livewire\Helpers\Traits\AsPage;
use Livewire\Component;

class Page extends Component
{
    use AsPage;

    public function render()
    {
        return view('livewire..admin.page')
            ->layout('livewire.admin.layout')->title($this->getLayoutTitle());
    }

    function getPageTitle()
    {
        return 'Page example';
    }

    function getPageBreadcrumbs()
    {
        return [
            [
                'label' => 'Page example',
                'href' => route('admin.page')
            ]
        ];
    }

    function getPageActions()
    {
        return [];
    }
}
