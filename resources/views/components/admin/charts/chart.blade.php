@props([
    'id' => null,
    'type' => 'bar',
])

@php

    if (empty($id)) {
        throw new \Exception("Needs a value to prop 'id'.");
    }

    $data = [
        'id' => $id,
        'type' => $type,
        'data' => $this->chartData()[$id] ?? [],
    ];

@endphp

<canvas
    x-data="{
        ...{{ json_encode($data) }},

        init() {
            $nextTick(() => {
                new Chart($el, {
                    type: this.type,
                    data: this.data,
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            });
        }

    }"

    id="{{ $data['id'] }}"></canvas>
