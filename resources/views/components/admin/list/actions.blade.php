@props([
    'show' => false,
    'edit' => false,
    'delete' => false,
])

<div
    class="w-full flex gap-1 justify-end items-center opacity-0 translate-x-4 group-hover:opacity-100 group-hover:translate-x-0 duration-300">

    {{ $slot }}

    @if ($show)
        <x-admin.list.actions.show />
    @endif

    @if ($edit)
        <x-admin.list.actions.edit />
    @endif

    @if ($delete)
        <x-admin.list.actions.delete />
    @endif
</div>
