@props([
    'item' => null,
    'toggler' => false,
])

@php

    $isActive = in_array(\Route::currentRouteName(), $item['activeIn'] ?? []);

    if (!$toggler) {
        $attributes = $attributes->merge(['wire:navigate' => true]);
    }

@endphp

@if (!isset($item['show']) || $item['show'])
    <a
        x-data="{{ json_encode([
            'activeToggler' => $toggler ? $isActive : false,
        ]) }}"
        x-on:click="activeToggler = !activeToggler"
        class="w-full inline-flex items-center hover:bg-admin-primary-dark py-3 mb-1 px-4 text-admin-light-normal hover:text-admin-light-normal dark:text-admin-light-normal dark:hover:text-admin-light-normal hover:pl-5 duration-300 rounded {{ $isActive ? (!$toggler ? 'bg-admin-primary-dark' : 'text-opacity-50') : '' }}"
        href="{{ isset($item['route']['name']) ? route($item['route']['name'], $item['route']['params']) : '#' }}"
        title="{{ $item['title'] ?? $item['text'] }}"
        {{ $attributes }}>
        @isset($item['icon'])
            <x-admin.icon
                name="{{ $item['icon'] }}"
                class="mr-2" />
        @endisset

        <span class="pointer-events-none">
            {{ $item['text'] }}
        </span>

        @if ($toggler)
            <span class="ml-auto pointer-events-none">
                <x-admin.icon
                    x-show="!activeToggler"
                    name="chevron-right"
                    class="ml-auto" />
                <x-admin.icon
                    x-show="activeToggler"
                    name="chevron-down"
                    class="ml-auto" />
            </span>
        @endif
    </a>
@endif
