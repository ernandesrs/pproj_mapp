@props([
    'id' => null,
])

@php

    if (empty($id)) {
        throw new \Exception("Needs a value to prop 'id'.");
    }

@endphp

<canvas
    x-data="{
        ...{{ json_encode($this->chartData()[$id]->toArray()) }},

        init() {
            $nextTick(() => {
                new Chart($el, {
                    type: this.type,
                    data: this.data,
                    options: {
                    }
                });
            });
        }

    }"

    id="{{ $id }}"></canvas>
