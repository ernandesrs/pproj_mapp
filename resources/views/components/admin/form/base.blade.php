@props([
    'action' => 'save',
    'showSubmitButton' => true,
    'submittingText' => __('admin/words.submitting'),
    'submitText' => __('admin/words.submit'),
])

<form
    wire:submit="{{ $action }}">
    {{-- fields --}}
    <div {{ $attributes->merge(['class' => '']) }}>
        {{ $slot }}
    </div>

    {{-- submit --}}
    @if ($showSubmitButton)
        <div class="flex justify-center items-center gap-x-4 mt-6">
            <x-admin.clickable
                type="submit"
                text="{{ $submitText }}"
                wire:target="{{ $action }}"
                wire:loading.remove
                prepend-icon="check-lg" />

            <x-admin.clickable
                type="button"
                text="{{ $submittingText }}"
                wire:target="{{ $action }}"
                wire:loading.attr="disabled"
                wire:loading.class="animate-pulse"
                wire:loading
                prepend-icon="check-lg"
                loading />
        </div>
    @endif
</form>
