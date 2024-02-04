@props([
    'action' => 'save',
    'submittingText' => __('admin/worlds.submitting'),
    'submitText' => __('admin/worlds.submit'),
])

<form
    wire:submit="{{ $action }}">
    {{-- fields --}}
    <div>
        {{ $slot }}
    </div>

    {{-- submit --}}
    <div class="flex justify-center mt-6">
        <button
            wire:target="{{ $action }}"
            wire:loading.attr="disabled"
            wire:loading.class="animate-pulse"

            class="px-6 py-3 border border-admin-primary-normal bg-admin-primary-normal text-white rounded dark:border-admin-primary-dark dark:bg-admin-primary-dark dark:text-admin-light-normal"
            type="submit">
            <x-admin.icon name="check-lg" />
            <span
                wire:target="{{ $action }}"
                wire:loading
                class="pointer-events-none ml-3">{{ $submittingText }}</span>
            <span
                wire:target="{{ $action }}"
                wire:loading.remove
                class="pointer-events-none ml-3">{{ $submitText }}</span>
        </button>
    </div>
</form>
