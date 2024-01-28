@props([
    'navigation' => [],
    'activeIn' => [],
])

@php
    $isGroup = isset($toggler);
@endphp

<div
    x-data="{{ json_encode([
        'isGroup' => $isGroup,
        'show' => $isGroup ? (in_array(\Route::currentRouteName(), $activeIn) ? true : false) : true,
    ]) }}"
    {{ $attributes }}>

    @isset($toggler)
        <div x-on:click.prevent="show = !show">
            {{ $toggler }}
        </div>
    @endisset

    <nav
        x-show="show"
        class="flex flex-col {{ $isGroup ? 'ml-4' : '' }}"
        {{ $attributes }}>
        @foreach ($navigation as $nav)
            @isset($nav['items'])
                <x-admin.layout.aside-nav
                    :navigation="$nav['items']"
                    :active-in="$nav['activeIn']">
                    <x-slot name="toggler">
                        <x-admin.layout.aside-nav-link
                            :item="$nav"
                            toggler />
                    </x-slot>

                    @foreach ($nav['items'] as $subnav)
                        <x-admin.layout.aside-nav-link
                            :item="$subnav" />
                    @endforeach
                </x-admin.layout.aside-nav>
            @else
                <x-admin.layout.aside-nav-link
                    :item="$nav" />
            @endisset
        @endforeach
    </nav>
</div>
