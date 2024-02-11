@props([
    'text' => null,
    'secondary' => null,
    'top' => false,
])

<p>
    @if ($top)
        <span class="block font-normal text-sm text-admin-font-light-light">{{ $secondary }}</span>
    @endif
    <span class="block font-medium text-admin-font-light-dark dark:text-admin-font-dark-dark">{{ $text }}</span>
    @if (!$top)
        <span class="block font-normal text-sm text-admin-font-light-light">{{ $secondary }}</span>
    @endif
</p>
