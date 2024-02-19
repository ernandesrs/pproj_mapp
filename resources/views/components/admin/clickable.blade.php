@props([
    // primary, success, info, danger
    'color' => 'primary',

    //
    'text' => null,

    //
    'prependIcon' => null,

    //
    'appendIcon' => null,

    // small, default, large
    'size' => 'default',

    //
    'circle' => false,

    //
    'outlined' => false,

    //
    'loading' => false,
])

@php

    $onlyIcon = empty($text);

    $isLink = $attributes->has('href');

    $style = [
        'border hover:bg-opacity-75 hover:border-opacity-75 hover:text-opacity-75 duration-200 !text-admin-light-light dark:!text-admin-light-normal',
        $circle ? 'rounded-full' : 'rounded',
        [
            'primary' => 'border-admin-primary-normal dark:border-admin-primary-dark ' . ($outlined ? 'text-admin-primary-normal dark:text-admin-primary-normal' : 'text-white bg-admin-primary-normal dark:bg-admin-primary-dark'),
            'success' => 'border-admin-success-normal dark:border-admin-success-dark ' . ($outlined ? 'text-admin-success-normal dark:text-admin-success-dark' : 'text-white bg-admin-success-normal dark:bg-admin-success-dark'),
            'info' => 'border-admin-info-normal dark:border-admin-info-dark ' . ($outlined ? 'text-admin-info-normal dark:text-admin-info-dark' : 'text-white bg-admin-info-normal dark:bg-admin-info-dark'),
            'danger' => 'border-admin-danger-normal dark:border-admin-danger-dark ' . ($outlined ? 'text-admin-danger-normal dark:text-admin-danger-dark' : 'text-white bg-admin-danger-normal dark:bg-admin-danger-dark'),
        ][$color],
        $onlyIcon
            ? [
                'small' => 'px-3 py-2',
                'default' => 'px-4 py-3',
                'large' => 'px-5 py-4',
            ][$size]
            : [
                'small' => 'px-4 py-3 text-sm',
                'default' => 'px-6 py-3',
                'large' => 'px-8 py-4 text-lg',
            ][$size],
    ];

    if ($isLink) {
        $attributes = $attributes->merge([
            'wire:navigate' => true,
        ]);
    }

    $attributes = $attributes->merge([
        'class' => implode(' ', $style),
    ]);
@endphp

@if ($isLink)
    <a {{ $attributes }}>
        @if ($prependIcon)
            <x-admin.icon name="{{ $loading ? 'arrow-clockwise' : $prependIcon }}"
                class="pointer-events-none {{ !$onlyIcon ? 'mr-2' : '' }} {{ $loading ? 'animate-spin inline-block' : '' }}" />
        @endif
        @if ($text)
            <span class="pointer-events-none">{{ $text }}</span>
        @endif
        @if ($appendIcon)
            <x-admin.icon name="{{ $loading ? 'arrow-clockwise' : $appendIcon }}"
                class="pointer-events-none {{ !$onlyIcon ? 'ml-2' : '' }} {{ $loading ? 'animate-spin inline-block' : '' }}" />
        @endif
    </a>
@else
    <button {{ $attributes }}>
        @if ($prependIcon)
            <x-admin.icon name="{{ $loading ? 'arrow-clockwise' : $prependIcon }}"
                class="pointer-events-none {{ !$onlyIcon ? 'mr-2' : '' }} {{ $loading ? 'animate-spin inline-block' : '' }}" />
        @endif
        @if ($text)
            <span class="pointer-events-none">{{ $text }}</span>
        @endif
        @if ($appendIcon)
            <x-admin.icon name="{{ $loading ? 'arrow-clockwise' : $appendIcon }}"
                class="pointer-events-none {{ !$onlyIcon ? 'ml-2' : '' }} {{ $loading ? 'animate-spin inline-block' : '' }}" />
        @endif
    </button>
@endif
