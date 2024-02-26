@props([
    // default/primary, success, info, danger
    'color' => 'default',

    //
    'title' => __('admin/words.confirm'),

    //
    'text' => __('admin/alerts.confirmation.confirm'),

    //
    'buttonConfirmAction' => null,

    //
    'buttonConfirmText' => __('admin/words.confirm'),
])

@php
    $id = uniqid();
@endphp

<div
    {{ $attributes->only(['class'])->merge([
        'class' => '',
    ]) }}>
    <x-admin.dialog
        size="small"
        id="{{ $id }}"
        button-close-text="{{ __('admin/words.cancel') }}">

        <x-slot name="header">
            <h4
                class="text-lg md:text-xl font-medium {{ [
                    'default' => 'text-admin-dark-light',
                    'danger' => 'text-admin-danger-dark',
                    'success' => 'text-admin-success-dark',
                    'info' => 'text-admin-info-dark',
                ][$color] }}">
                {{ $title }}</h4>
        </x-slot>

        <div
            class="{{ [
                'default' => 'text-admin-dark-normal dark:text-admin-dark-dark',
                'danger' => 'text-admin-danger-normal dark:text-admin-danger-dark',
                'success' => 'text-admin-success-normal dark:text-admin-success-dark',
                'info' => 'text-admin-info-normal dark:text-admin-info-dark',
            ][$color] }} dark:text-opacity-90">
            {{ $text }}
        </div>

        <x-slot name="footer">
            <x-admin.buttons.clickable
                wire:target="{{ $buttonConfirmAction }}"
                wire:loading
                wire:loading.attr="disabled"
                wire:loading.class="animate-pulse"

                prepend-icon="check-lg"
                text="{{ $buttonConfirmText }}"
                size="small"
                color="{{ $color == 'default' ? 'primary' : $color }}"
                loading />

            <x-admin.buttons.clickable
                wire:target="{{ $buttonConfirmAction }}"
                wire:loading.remove
                wire:click="{{ $buttonConfirmAction }}"

                prepend-icon="check-lg"
                text="{{ $buttonConfirmText }}"
                size="small"
                color="{{ $color == 'default' ? 'primary' : $color }}" />
        </x-slot>

    </x-admin.dialog>

    <x-admin.activator target="{{ $id }}">
        {{ $slot }}
    </x-admin.activator>

</div>
