@props([
    'id' => null,
    'liveUpdate' => null,
])

@php

    if (empty($id)) {
        throw new \Exception("Needs a value to prop 'id'.");
    }

    if (!is_null($liveUpdate) && is_numeric($liveUpdate) && $liveUpdate >= 5) {
        $attributes = $attributes->merge([
            'wire:poll.' . $liveUpdate . 's' => "getChartData('" . $id . "', 1)",
        ]);
    }

@endphp

<canvas
    @chart_data_updated.window="chartUpdatedHandler"
    x-data="{
        ...{{ json_encode($this->getChartData($id)) }},
        id: '{{ $id }}',
        theme: 'dark',

        init() {
            $nextTick(() => {
                this.theme = window['adminTheme'].getTheme();

                const config = {
                    type: this.type,
                    data: this.data,
                    options: {}
                };

                config.data.datasets = this.defineDatasetsColors(config.data.datasets);

                if (!window[this.id]) {
                    window[this.id] = new Chart($el, config);
                } else {
                    window[this.id].destroy();
                    window[this.id] = new Chart($el, config);
                }

                this.defineChartTheme();
            });
        },
        defineChartTheme() {
            this.updateAndRender();
        },
        chartUpdatedHandler(e) {
            if (e.detail[0]?.id != this.id) {
                return;
            }

            const datasets = e.detail[0].datasets;

            for (let i = 0; i < datasets.length; i++) {
                window[this.id].config.data.datasets[i].data = datasets[i].data;
            }

            this.updateAndRender(true);
        },
        updateAndRender(updating = false) {
            window[this.id].update(updating ? 'none' : 'show');
            window[this.id].render();
        },
        defineDatasetsColors(datasets) {
            for (let i = 0; i < datasets.length; i++) {
                datasets[i].backgroundColor = datasets[i].colors.map((color) => { return color[this.theme == 'light' ? 0 : 1] });
            }

            return datasets;
        }
    }"

    {{ $attributes }}></canvas>
