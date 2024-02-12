@php

    $data = \App\Livewire\Helpers\Alert::getFlash() ?? [
        'text' => '',
    ];

@endphp

<div

    x-data="{
        ...{{ json_encode([
            'data' => $data,
        ]) }},
        timerHandler: null,
        timerProgress: 0,
        timerProgressHandler: null,

        init() {
            $nextTick(() => {
                if (this.data.text.length) {
                    this.show();
                }
            });
        },
        add(event) {
            let data = event.detail[0] ?? null;

            if (this.show) {
                this.close();
                this.data = data;

                setTimeout(() => {
                    this.show();
                }, 100);
            } else {
                this.data = data;
                this.show();
            }

        },
        show() {
            this.data.show = true;

            this.initTimer();
        },
        close() {
            this.data.show = false;

            this.clearHandlers();
        },
        initTimer() {
            if (!this.data.show) {
                return;
            }

            this.timerHandler = setTimeout(() => {
                this.close();
            }, this.data.duration);

            this.timerProgressHandler = setInterval(() => {
                this.timerProgress++;
            }, this.data.duration / 100);
        },
        pauseTimer() {
            this.clearHandlers();
        },
        clearHandlers() {
            clearTimeout(this.timerHandler);
            clearInterval(this.timerProgressHandler);
            this.timerProgress = 0;
        }
    }"

    x-on:server_alert.window="add"
    x-on:mouseenter="pauseTimer"
    x-on:mouseleave="initTimer"
    x-show="data.show"
    x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="opacity-0 scale-90 translate-x-full"
    x-transition:enter-end="opacity-100 scale-100 translate-x-0"
    x-transition:leave="transition ease-in duration-100 translate-x-full"
    x-transition:leave-start="opacity-100 scale-100 translate-x-0"
    x-transition:leave-end="opacity-0 scale-90"

    class="py-4 px-6 fixed z-40 top-0 right-0 w-full" style="display: none">
    <div
        class="bg-admin-light-light w-full max-w-[425px] flex items-start border border-l-4 p-3 ml-auto rounded shadow-md relative overflow-hidden dark:bg-admin-dark-light"
        x-bind:class="{
            'default': 'text-admin-light-dark border-admin-light-dark dark:border-admin-dark-normal',
            'success': 'text-admin-success-normal border-admin-success-normal dark:text-admin-success-dark dark:border-admin-success-dark',
            'info': 'text-admin-info-normal border-admin-info-light dark:text-admin-info-dark dark:border-admin-info-normal',
            'danger': 'text-admin-danger-normal border-admin-danger-light dark:text-admin-danger-normal dark:border-admin-danger-dark',
            'error': 'text-admin-danger-normal border-admin-danger-light dark:text-admin-danger-normal dark:border-admin-danger-dark',
            'warning': 'text-admin-warning-normal border-admin-warning-light dark:text-admin-warning-dark dark:border-admin-warning-dark',
        } [data.type]">
        <div class="w-full relative z-0 flex items-start mb-1">
            {{-- icon --}}
            <div class="text-2xl mr-2">
                <x-admin.icon x-show="['default', 'danger', 'warning'].includes(data.type)" name="exclamation-circle" />
                <x-admin.icon x-show="['success'].includes(data.type)" name="check-circle" />
                <x-admin.icon x-show="['info'].includes(data.type)" name="info-circle" />
                <x-admin.icon x-show="['error'].includes(data.type)" name="x-circle" />
            </div>

            {{-- text --}}
            <div class="w-full px-2 cursor-default">
                <p x-text="data.text"></p>
            </div>

            {{-- close --}}
            <button
                x-on:click="close"
                class="text-admin-danger-light dark:text-admin-danger-normal pl-2 justify-self-end">
                <x-admin.icon name="x-lg" />
            </button>
        </div>

        {{-- timer --}}
        <div
            class="w-full h-1 absolute z-10 left-0 bottom-0 bg-opacity-30"
            :class="{
                'default': 'bg-admin-light-normal dark:bg-admin-dark-dark dark:bg-opacity-15',
                'success': 'bg-admin-success-light',
                'info': 'bg-admin-info-light',
                'danger': 'bg-admin-danger-light dark:bg-admin-danger-normal dark:bg-opacity-30',
                'error': 'bg-admin-danger-light dark:bg-admin-danger-normal dark:bg-opacity-30',
                'warning': 'bg-admin-warning-light dark:bg-admin-warning-normal dark:bg-opacity-30',
            } [data.type]">
            <div
                class="w-0 h-full"
                :class="{
                    'default': 'bg-admin-light-dark dark:bg-admin-dark-normal',
                    'success': 'bg-admin-success-normal dark:bg-admin-success-dark',
                    'info': 'bg-admin-info-light dark:bg-admin-info-normal',
                    'danger': 'bg-admin-danger-light dark:bg-admin-danger-dark',
                    'error': 'bg-admin-danger-light dark:bg-admin-danger-dark',
                    'warning': 'bg-admin-warning-light dark:bg-admin-warning-dark',
                } [data.type]"
                :style="'width:' + timerProgress + '%'">
            </div>
        </div>
    </div>
</div>
