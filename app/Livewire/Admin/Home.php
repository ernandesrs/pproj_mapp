<?php

namespace App\Livewire\Admin;

use App\Livewire\Admin\PageBases\PageBaseSimple;
use App\Livewire\Helpers\Chart\WithChart;

class Home extends PageBaseSimple
{
    use WithChart;

    public $viewContent = 'home';

    public $uncontained = true;

    function setChartData()
    {
        return [
            'homeChartBar' => $this->chartBar()
                ->addLabels(['Jan', 'Fev', 'Mar'])
                ->addDataset('Label #1', [4, 3, 33])
                ->addDataset('Label #2', [40, 13, 73]),
            'homeChartPie' => $this->chartPie()
                ->addLabels(['Jan', 'Fev', 'Mar'])
                ->addDataset('Label #1', [99, 10, 33])
        ];
    }

    function setPageTitle()
    {
        return null;
    }

    function getLayoutTitle()
    {
        return __('admin/layout.overview');
    }

    function setPageBreadcrumbs()
    {
        return [];
    }

    function setPageActions()
    {
        return [];
    }
}
