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
        $callable = static::setChartData()[$chartId] ?? null;

        if (!$callable) {
            return null;
        }

        if (!is_callable($callable)) {
            throw new \Exception("'{$chartId}' needs to be a callable.");
        }

        return $updating ? $this->emit($callable(new Chart())->toArray(), $chartId) : $callable(new Chart())->toArray();
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
}
