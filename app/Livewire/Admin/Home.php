<?php

namespace App\Livewire\Admin;

use App\Livewire\Admin\PageBases\PageBaseSimple;

class Home extends PageBaseSimple
{
    public $viewContent = 'home';

    public $uncontained = true;

    function chartData()
    {
        return [
            'homeChartBar' => [
                'labels' => ['Red', 'Blue', 'Purple', 'Orange'],
                'datasets' => [
                    [
                        'label' => '# of Votes',
                        'data' => [12, 19, 3, 3],
                        'borderWidth' => 1
                    ],
                    [
                        'label' => '# of Votes',
                        'data' => [12, 19, 3, 3],
                        'borderWidth' => 1
                    ]
                ]
            ],
            'homeChartPie' => [
                'labels' => ['Red', 'Blue', 'Purple', 'Orange'],
                'datasets' => [
                    [
                        'label' => '# of Votes',
                        'data' => [12, 19, 3, 5, 2, 3],
                        'borderWidth' => 1
                    ]
                ]
            ],
            'homeChartDoughnut' => [
                'labels' => ['Green', 'Purple', 'Orange'],
                'datasets' => [
                    [
                        'label' => '# of Votes',
                        'data' => [12, 19, 3, 5, 2, 3],
                        'borderWidth' => 1
                    ]
                ]
            ]
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
