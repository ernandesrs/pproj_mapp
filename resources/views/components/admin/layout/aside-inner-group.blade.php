@props([
    'title' => null,
    'navigation' => [],
])

<div {{ $attributes->merge(['class' => 'mb-6']) }}>
    @empty(!$title)
        <h5 class="font-medium text-xs mb-3">
            {{ $title }}
        </h5>
    @endempty

    @if (count($navigation))
        <x-admin.layout.aside-nav :navigation="$navigation" />
    @endif
</div>
