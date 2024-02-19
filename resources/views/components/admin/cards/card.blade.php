@props([
    'icon' => null,
    'title' => null,
    'color' => 'default',
])

@php

    $style = [
        'flex items-start border px-6 py-4 rounded shadow bg-admin-light-light hover:shadow-md duration-300 cursor-default dark:bg-admin-dark-normal border-opacity-50 dark:shadow-admin-dark-dark dark:opacity-100',
        [
            'primary' => 'text-admin-primary-normal border-admin-primary-normal dark:text-admin-primary-dark dark:border-admin-primary-dark',
            'info' => 'text-admin-info-normal border-admin-info-normal dark:text-admin-info-dark dark:border-admin-info-dark',
            'success' => 'text-admin-success-normal border-admin-success-normal dark:text-admin-success-dark dark:border-admin-success-dark',
            'danger' => 'text-admin-danger-normal border-admin-danger-normal dark:text-admin-danger-dark dark:border-admin-danger-dark',
            'warning' => 'text-admin-warning-normal border-admin-warning-normal dark:text-admin-warning-dark dark:border-admin-warning-dark',
            'dark' => 'text-admin-dark-normal border-admin-dark-normal dark:text-admin-light-dark dark:border-admin-dark-dark dark:border-opacity-35',
            'default' => 'text-admin-font-light-light border-admin-light-dark dark:text-admin-font-dark-light dark:border-admin-dark-light',
        ][$color],
    ];

@endphp

<div
    {{ $attributes->only(['class'])->merge([
        'class' => implode(' ', $style),
    ]) }}>
    @if ($icon)
        <x-admin.icon
            name="{{ $icon }}"
            class="text-2xl md:text-3xl lg:text-4xl mr-3 opacity-50 dark:opacity-100" />
    @endif
    <div class="w-full">
        @if ($title)
            <div class="mb-3 opacity-75 dark:opacity-100">
                <h4 class="font-semibold md:text-lg lg:text-xl">{{ $title }}</h4>
            </div>
        @endif
        <div>
            {{ $slot }}
        </div>
    </div>
</div>
