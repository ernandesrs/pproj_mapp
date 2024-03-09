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
     * @return Chart
     */
    function addDataset(string $datasetLabel, array $data = [])
    {
        $this->datasets[] = [
            'label' => $datasetLabel,
            'data' => $data
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

    /**
     * Define chart colors
     *
     * @return array
     */
    static function colors()
    {
        return [
            'blue' => '#fefeff',
            'red' => '#ff6384',
            'green' => '#4ac1c0',
            'orange' => '#ff9e41',
            'purple' => '#9867ff',
            'yellow' => '#fecd57',
            'gray' => '#c8cbce',
        ];
    }
}
