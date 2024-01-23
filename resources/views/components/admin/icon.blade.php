@props([
    'name' => null,
])

<i {{ $attributes->merge(['class' => 'bi bi-' . $name . ' pointer-events-none']) }} {{ $attributes }}></i>
