<?php

namespace App\Livewire\Admin;

use App\Livewire\Admin\PageBases\PageBaseSimple;
use App\Livewire\Helpers\Chart\WithChart;

class Home extends PageBaseSimple
{
    use WithChart;

    public $viewContent = 'home';

    public $uncontained = true;

    function chartData()
    {
        return [
            'homeChartBar' => $this->chartBar()
                ->addLabels(['A', 'B', 'C', 'D'])
                ->addDataset('Opa #1', [100, 3, 10, 213])
                ->addDataset('Opa #2', [10, 39, 79, 99]),
            'homeChartPie' => $this->chartPie()
                ->addLabels(['Ab', 'Bc', 'Cd'])
                ->addDataset('Opa #1', [50, 5, 75]),
            'homeChartDoughnut' => $this->chartDoughnut()
                ->addLabels(['De', 'Ef', 'Gh'])
                ->addDataset('Opa #1', [50, 5, 75])
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
