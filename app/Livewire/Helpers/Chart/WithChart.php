<?php

namespace App\Livewire\Helpers\Chart;

trait WithChart
{
    /**
     * Chart of type 'bar'
     *
     * @return Chart
     */
    function chartBar()
    {
        return new Chart('bar');
    }

    /**
     * Chart of type pie
     *
     * @return Chart
     */
    function chartPie()
    {
        return new Chart('pie');
    }

    /**
     * Chart of type doughnut
     *
     * @return Chart
     */
    function chartDoughnut()
    {
        return new Chart('doughnut');
    }
}
