@php

    $type = 'default';
    $float = false;
    $text = 'Lorem dolor sit natus lodolor sit natus lodolor dolor sit natus';

    $data = [
        'show' => false,
        'type' => $type,
        'float' => $float,
        'text' => $text,
    ];

@endphp

<div

    x-data="{
        ...{{ json_encode($data) }},

        init() {
            $nextTick(() => {
                if (this.text.length) {
                    this.showAlert();

                    console.log(this.show);
                }
            });
        },
        showAlert() {
            this.show = true;
        },
        closeAlert() {
            this.show = false;
        }
    }"

    x-show="show"
    x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="opacity-0 scale-90 translate-x-full"
    x-transition:enter-end="opacity-100 scale-100 translate-x-0"
    x-transition:leave="transition ease-in duration-100 translate-x-full"
    x-transition:leave-start="opacity-100 scale-100 translate-x-0"
    x-transition:leave-end="opacity-0 scale-90"

    class="py-4 px-6 fixed top-0 right-0 w-full" style="display: none">
    <div
        class="bg-admin-light-light w-full max-w-[425px] flex items-start border border-l-4 p-3 ml-auto rounded shadow-md relative overflow-hidden dark:bg-admin-dark-light {{ [
            'default' => 'text-admin-light-dark border-admin-light-dark dark:border-admin-dark-normal',
            'success' =>
                'text-admin-success-normal border-admin-success-normal dark:text-admin-success-dark dark:border-admin-success-dark',
            'info' => 'text-admin-info-normal border-admin-info-light dark:text-admin-info-dark dark:border-admin-info-normal',
            'danger' =>
                'text-admin-danger-normal border-admin-danger-light dark:text-admin-danger-normal dark:border-admin-danger-dark',
            'error' =>
                'text-admin-danger-normal border-admin-danger-light dark:text-admin-danger-normal dark:border-admin-danger-dark',
            'warning' =>
                'text-admin-warning-normal border-admin-warning-light dark:text-admin-warning-dark dark:border-admin-warning-dark',
        ][$type] }}">
        <div class="w-full relative z-0 flex items-start mb-1">
            {{-- icon --}}
            <div class="text-2xl mr-2">
                <x-admin.icon
                    name="{{ [
                        'default' => 'exclamation-circle',
                        'success' => 'check-circle',
                        'info' => 'info-circle',
                        'danger' => 'exclamation-circle',
                        'error' => 'x-circle',
                        'warning' => 'exclamation-circle',
                    ][$type] }}" />
            </div>

            {{-- text --}}
            <div class="w-full px-2 cursor-default">
                <p class="">
                    {{ $text }}
                </p>
            </div>

            {{-- close --}}
            <button
                x-on:click="closeAlert"
                class="text-admin-danger-light dark:text-admin-danger-normal pl-2 justify-self-end">
                <x-admin.icon name="x-lg" />
            </button>
        </div>

        {{-- timer --}}
        @if ($float)
            <div
                class="w-full h-1 absolute z-10 left-0 bottom-0 {{ [
                    'default' => 'bg-admin-light-normal dark:bg-admin-dark-dark dark:bg-opacity-15',
                    'success' => 'bg-admin-success-light',
                    'info' => 'bg-admin-info-light',
                    'danger' => 'bg-admin-danger-light dark:bg-admin-danger-normal dark:bg-opacity-30',
                    'error' => 'bg-admin-danger-light dark:bg-admin-danger-normal dark:bg-opacity-30',
                    'warning' => 'bg-admin-warning-light dark:bg-admin-warning-normal dark:bg-opacity-30',
                ][$type] }} bg-opacity-30">
                <div
                    class="w-0 h-full {{ [
                        'default' => 'bg-admin-light-dark dark:bg-admin-dark-normal',
                        'success' => 'bg-admin-success-normal dark:bg-admin-success-dark',
                        'info' => 'bg-admin-info-light dark:bg-admin-info-normal',
                        'danger' => 'bg-admin-danger-light dark:bg-admin-danger-dark',
                        'error' => 'bg-admin-danger-light dark:bg-admin-danger-dark',
                        'warning' => 'bg-admin-warning-light dark:bg-admin-warning-dark',
                    ][$type] }}">
                </div>
            </div>
        @endif
    </div>
</div>
