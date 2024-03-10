<?php

namespace App\Livewire\Helpers\Chart;

class Chart
{
    const ALLOWED_TYPES = ['pie', 'bar', 'doughnut', 'line'];

    /**
     * Constructor
     *
     * @param string $type
     * @param array $labels
     * @param array $datasets
     */
    function __construct(public string $type = 'bar', public array $labels = [], public array $datasets = [])
    {
    }

    /**
     * Define chart type
     *
     * @param string $type
     * @return Chart
     */
    function addType(string $type = 'bar')
    {
        if (!in_array($type, self::ALLOWED_TYPES)) {
            throw new \Exception("Type '{$type}' is not allowed. Allowed types: " . implode(', ', self::ALLOWED_TYPES));
        }

        $this->type = $type;
        return $this;
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
     * @param array<array> $colors array with the color for each data in the dataset, something like:
     * [
     *      ChartColors::BLUE,
     *      ChartColors::GREEN
     * ]
     * @return Chart
     */
    function addDataset(string $datasetLabel, array $data = [], array $colors)
    {
        $this->datasets[] = [
            'label' => $datasetLabel,
            'data' => $data,
            'colors' => $colors,
            'borderColors' => ChartColors::BORDER,
            'tension' => 0.4,
            'hoverOffset' => 10
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
