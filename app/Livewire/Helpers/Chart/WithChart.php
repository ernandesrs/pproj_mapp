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
     * @param bool $updating
     * @return null|array
     */
    #[\Livewire\Attributes\Renderless]
    function getChartData(string $chartId, bool $updating = false)
    {
        $chartData = static::setChartData()[$chartId] ?? null;

        return $chartData ? $updating ? $this->emit($chartData->toArray(), $chartId) : $chartData->toArray() : null;
    }

    /**
     * Emit event with updated chart data
     *
     * @param array $data
     * @param string $chartId
     * @return void
     */
    private function emit(array $data, string $chartId)
    {
        $this->dispatch('chart_data_updated', [
            'id' => $chartId,
            'datasets' => $data['data']['datasets']
        ]);
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
