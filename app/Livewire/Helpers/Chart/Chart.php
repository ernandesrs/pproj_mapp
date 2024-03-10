<?php

namespace App\Livewire\Helpers\Chart;

class Chart
{
    /**
     * Constructor
     *
     * @param string $type
     * @param array $labels
     * @param array $datasets
     */
    function __construct(public string $type, public array $labels = [], public array $datasets = [])
    {
    }

    /**
     * Add chart label
     *
     * @param array $labels
     * @return Chart
     */
    function addLabels(array $labels = [])
    {
        $this->labels = $labels;
        return $this;
    }

    /**
     * Add chart dataset
     *
     * @param string $datasetLabel dataset label
     * @param array $data dataset data
     * @param array $colors array with the color for each data in the dataset
     * @return Chart
     */
    function addDataset(string $datasetLabel, array $data = [], array $colors)
    {
        $this->datasets[] = [
            'label' => $datasetLabel,
            'data' => $data,
            'colors' => $colors
        ];
        return $this;
    }

    /**
     * Get chart data as array
     *
     * @return array
     */
    function toArray()
    {
        return [
            'type' => $this->type,
            'data' => [
                'labels' => $this->labels,
                'datasets' => $this->datasets
            ]
        ];
    }
}
