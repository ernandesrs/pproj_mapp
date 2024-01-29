<?php

namespace App\Livewire\Admin;

use App\Livewire\Helpers\Traits\AsPage;
use Livewire\Component;

class Home extends Component
{
    use AsPage;

    public function render()
    {
        return view('livewire..admin.home')->layout('livewire.admin.layout')->title(__('admin/layout.overview'));
    }

    function getPageTitle()
    {
        return null;
    }

    function getPageBreadcrumbs()
    {
        return [];
    }

    function getPageActions()
    {
        return [];
    }
}
