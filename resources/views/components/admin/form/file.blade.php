@props([
    'action' => 'saveFile',
])

<div class="relative">
    <div class="relative">
        <x-admin.form.field
            type="file"
            class="relative z-0" {{ $attributes }} />

        <div
            wire:target="{{ $action }}"
            wire:loading
            class="absolute w-full top-0 left-0 bg-admin-light-light rounded dark:bg-admin-dark-light">
            <div class="w-full py-4 flex items-center justify-center animate-pulse">
                {{ __('admin/worlds.saving') }}...
            </div>
        </div>
    </div>
</div>
