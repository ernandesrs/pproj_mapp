<?php

namespace App\Livewire\Helpers\Chart;

trait WithChart
{
    /**
     * Set charts data
     *
     * @return array<Chart> something like:
     * [
     *      'chartOneId' => $this->chartBar()->addLabels(['Jan', 'Fev', 'Mar'])->addDataset('Label', [40, 3, 33]),
     *      'chartTwoId' => $this->chartPie()->addLabels(['Jan', 'Fev', 'Mar'])->addDataset('Label', [40, 3, 33]),
     * ]
     */
    abstract function setChartData();

    /**
     * Get chart data
     *
     * @param string $chartId
     * @return null|array
     */
    function getChartData(string $chartId)
    {
        $chartData = static::setChartData()[$chartId] ?? null;
        return $chartData ? $chartData->toArray() : null;
    }

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
