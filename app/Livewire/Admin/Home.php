<?php

namespace App\Livewire\Admin;

use App\Livewire\Admin\PageBases\PageBaseSimple;
use App\Livewire\Helpers\Chart\Chart;
use App\Livewire\Helpers\Chart\ChartColors;
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
            'homeChartBar' => function (Chart $chart) use ($data) {
                return $chart->addType('bar')
                    ->addLabels(['Jan', 'Fev', 'Mar'])
                    ->addDataset('Label #1', explode(",", $data->bar), [
                        ChartColors::ORANGE,
                        ChartColors::ORANGE,
                        ChartColors::ORANGE,
                    ])
                    ->addDataset('Label #2', explode(",", $data->bar2), [
                        ChartColors::PURPLE,
                        ChartColors::PURPLE,
                        ChartColors::PURPLE,
                    ])
                    ->addDataset('Label #3', explode(",", $data->bar3), [
                        ChartColors::BLUE,
                        ChartColors::BLUE,
                        ChartColors::BLUE,
                    ]);
            },
            'homeChartPie' => function (Chart $chart) use ($data) {
                return $chart
                    ->addType('pie')
                    ->addLabels(['Jan', 'Fev', 'Mar'])
                    ->addDataset('Label #1', explode(",", $data->pie), [
                        ChartColors::BLUE,
                        ChartColors::GREEN,
                        ChartColors::PURPLE
                    ]);
            },
            'homeChartLine' => function (Chart $chart) use ($data) {
                return $chart->addType('line')
                    ->addLabels(['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun'])
                    ->addDataset('Gastos', explode(",", $data->line), [
                        ChartColors::RED,
                        ChartColors::RED,
                        ChartColors::RED,
                    ])
                    ->addDataset('Lucros', explode(",", $data->line2), [
                        ChartColors::GREEN,
                        ChartColors::GREEN,
                        ChartColors::GREEN,
                    ]);
            },
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
