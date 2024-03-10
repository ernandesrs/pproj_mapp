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
        $data = json_decode(file_get_contents(base_path() . '/data.json'));

        return [
            'homeChartBar' => $this->chartBar()
                ->addLabels(['Jan', 'Fev', 'Mar'])
                ->addDataset('Label #1', explode(",", $data->bar))
                ->addDataset('Label #2', explode(",", $data->bar2))
                ->addDataset('Label #3', explode(",", $data->bar3)),
            'homeChartPie' => $this->chartPie()
                ->addLabels(['Jan', 'Fev', 'Mar', 'Abr', 'Mai'])
                ->addDataset('Label #1', explode(",", $data->pie))
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
