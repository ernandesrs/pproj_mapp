@props([
    'target' => null,
])

@php
    if (empty($target)) {
        throw new \Exception('Needs a value to "target" prop');
    }
@endphp

<div x-on:click="$dispatch('activator_to_{{ $target }}', {
    target: '{{ $target }}'
})"
    class="cursor-pointer">
    {{ $slot }}
</div>
