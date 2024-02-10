@props([
    'size' => 'xs',
    'color' => 'success',
    'icon' => null,
    'prependIcon' => null,
    'circle' => false,
    'appendIcon' => null,
])

@php
    $colors = [
        'success' => 'bg-admin-success-normal dark:bg-admin-success-dark',
        'primary' => 'bg-admin-primary-normal dark:bg-admin-primary-dark',
        'info' => 'bg-admin-info-normal dark:bg-admin-info-dark',
        'danger' => 'bg-admin-danger-normal dark:bg-admin-danger-dark',
        'warning' => 'bg-admin-warning-normal dark:bg-admin-warning-dark',
        'dark' => 'bg-admin-dark-normal dark:bg-admin-dark-normal',
        'light' => 'bg-admin-light-normal text-admin-font-dark-dark dark:bg-admin-dark-normal',
    ];

    $sizes = [
        'xs' => 'text-xs',
        'sm' => 'text-sm',
        'normal' => 'text-base',
    ];
@endphp

<span
    class="{{ $sizes[$size] ?? $sizes['xs'] }} px-2 py-1 {{ $circle ? 'rounded-full' : 'rounded' }} text-admin-font-dark-dark {{ $colors[$color] }}">
    @if ($icon || $prependIcon)
        <x-admin.icon name="{{ $icon ?? $prependIcon }}" class="{{ $slot ?? null ? '' : 'mr-1' }}" />
    @endif
    <span>{{ $slot }}</span>
    @if ($appendIcon)
        <x-admin.icon name="{{ $appendIcon }}" class="{{ $slot ?? null ? '' : 'ml-1' }}" />
    @endif
</span>
