@props([
    // avatar, cover, square
    'type' => 'avatar',

    // default, extrasmall, small, large, extralarge
    'size' => 'default',
    'image' => null,
    'alternativeText' => 'Avatar',
])

<div class="thumbnail thumbnail-{{ $size }} thumbnail-{{ $type }}">
    @if ($image)
        <img class="image" src="{{ $image }}" alt="{{ $alternativeText }}">
    @else
        <span class="alternative">{{ strtoupper($alternativeText[0]) }}</span>
    @endif
</div>
