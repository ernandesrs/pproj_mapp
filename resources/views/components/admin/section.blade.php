@props([
    'title' => null,
])

<div
    {{ $attributes->merge(['class' => 'bg-admin-light-light w-full border py-6 px-8 rounded dark:bg-admin-dark-normal dark:bg-opacity-75 dark:border-admin-dark-normal']) }}>

    @if (!empty($title))
        <h4 class="text-lg font-medium mb-3">{{ $title }}</h4>
    @endif

    {{ $slot }}
</div>
