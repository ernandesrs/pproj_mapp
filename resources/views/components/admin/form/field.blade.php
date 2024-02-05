@props([
    'type' => 'text',
    'options' => [],
    'label' => null,
    'error' => null,

    'group' => 'data',
    'name' => '',
])

@php
    if (!$attributes->get('id')) {
        $attributes = $attributes->merge(['id' => uniqid()]);
    }

    if (!empty($name)) {
        $fname = $group . '.' . $name;
        $attributes = $attributes->merge(['wire:model' => $fname]);
    }

    if (!$error && !empty($name)) {
        $error = $errors->first($fname);
    }

    $class = 'w-full rounded outline-none focus:shadow-md border px-4 py-3 dark:bg-admin-dark-light dark:shadow-admin-dark-dark dark:border-admin-dark-dark ' . ($error ? 'border-admin-danger-normal dark:border-admin-danger-dark' : '');
@endphp

<div {{ $attributes->only(['class'])->merge(['class' => 'flex flex-col']) }}>
    @if ($label)
        <label for="{{ $attributes->get('id') }}" class="mb-2 dark:text-admin-font-dark-dark">
            {{ $label }}
        </label>
    @endif

    @if ($type == 'select')
        <select
            {{ $attributes->except(['class']) }}
            class="{{ $class }}">
            @foreach ($options as $option)
                <option value="{{ $option['value'] }}">
                    {{ $option['label'] }}
                </option>
            @endforeach
        </select>
    @else
        <div
            x-data="{
                ...{{ json_encode([
                    'type' => $type,
                ]) }},

                passwordFieldTypeToggle() {
                    this.type = this.type == 'password' ? 'text' : 'password';
                }
            }" class="flex items-center relative">
            <input
                :type="type"
                {{ $attributes->except(['class']) }}
                class="{{ $class }}">
            @if ($type == 'password')
                <button x-on:click="passwordFieldTypeToggle" type="button" class="absolute right-0 px-4 py-3">
                    <x-admin.icon x-show="type == 'password'" name="eye" />
                    <x-admin.icon x-show="type != 'password'" name="eye-slash" />
                </button>
            @endif
            @if ($type == 'file')
                <div
                    class="absolute w-full top-0 left-0 bg-transparent p-1 pointer-events-none">
                    <div
                        class="flex items-center left-0 top-0 bg-admin-light-light rounded overflow-hidden dark:bg-admin-dark-light">
                        <div

                            class="bg-admin-light-normal px-4 py-3 rounded-tl rounded-bl dark:bg-admin-dark-normal">
                            {{ __('admin/worlds.upload') }}
                        </div>
                        <div class="w-full h-full flex items-center px-4">
                            {{ empty($this->$group[$name]) ? __('admin/worlds.select_file') : __('admin/worlds.selected_file') }}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    @endif

    @if ($error)
        <small class="text-admin-danger-normal dark:text-admin-danger-dark mt-1 italic">
            {{ $error }}
        </small>
    @endif
</div>
