@props([
    /**
     *
     * temp file instance
     *
     */
    'tempFile' => null,

    /**
     *
     * action to save file
     *
     */
    'actionSave' => null,

    /**
     *
     * action to clear file
     *
     */
    'actionClear' => null,

    /**
     *
     * field error
     *
     */
    'error' => null,
])

@php
    $hasTempFileInstance = !empty($tempFile) ? gettype($tempFile) == 'object' : false;
@endphp

<div class="relative"
    x-data="{
        uploading: false,
        progress: 0,

        selectFiles() {
            $el.querySelector('input[type=file]').click();
        },
        endUpload() {
            this.uploading = false;
            this.progress = 0;
        }
    }"
    x-on:livewire-upload-start="uploading = true"
    x-on:livewire-upload-finish="endUpload"
    x-on:livewire-upload-cancel="endUpload"
    x-on:livewire-upload-error="endUpload"
    x-on:livewire-upload-progress="progress = $event.detail.progress">
    <div class="flex items-center">
        <div class="relative w-full">
            <input
                type="file"
                {{ $attributes->except(['class']) }} class="relative z-0 hidden"
                :disabled="uploading" />

            {{-- custom --}}
            <div x-on:click="selectFiles"
                class="w-full flex items-center relative top-0 left-0 border bg-admin-light-light rounded p-1 dark:bg-admin-dark-light dark:border-admin-dark-dark"
                :class="uploading ? 'animate-pulse pointer-events-none' : ''">
                <span
                    class="inline-block bg-admin-light-normal dark:bg-admin-dark-normal px-4 py-2 rounded-tl rounded-bl">
                    {{ __('admin/worlds.upload') }}
                </span>
                <span class="inline-block px-3 whitespace-nowrap">
                    <span x-show="!uploading">
                        @if (empty($tempFile))
                            {{ __('admin/worlds.select_file') }}
                        @else
                            @if ($hasTempFileInstance)
                                {{ \Str::substr($tempFile->getClientOriginalName(), 0, 8) }}...
                            @else
                                {{ __('admin/worlds.select_file') }}
                            @endif
                        @endif
                    </span>
                    <span x-show="uploading">
                        {{ __('admin/worlds.uploading') }}...
                    </span>
                </span>
            </div>

            @if ($error)
                <small class="text-admin-danger-normal dark:text-admin-danger-dark">{{ $error }}</small>
            @endif
        </div>

        <div class="ml-2 flex items-center">
            {{-- clear/save --}}
            @if ($hasTempFileInstance)
                @if ($actionClear)
                    <button
                        class="text-admin-danger-normal dark:text-admin-danger-dark px-1 py-1 rounded-full text-lg md:text-base"
                        wire:click="{{ $actionClear }}">
                        <x-admin.icon name="x-circle" />
                    </button>
                @endif

                @if ($actionSave)
                    <button
                        class="text-admin-success-normal dark:text-admin-success-dark px-1 py-1 rounded-full text-lg md:text-base"
                        wire:click="{{ $actionSave }}">
                        <x-admin.icon name="check-circle" />
                    </button>
                @endif
            @endif

            {{-- progress bar --}}
            <div
                x-show="uploading"
                class="w-10 h-10 flex justify-center items-center rounded-full text-xs font-medium text-admin-font-dark-normal dark:text-admin-font-dark-light border-2 dark:border-admin-dark-light relative overflow-hidden">
                <span class="absolute z-10"><span x-text="progress"></span>%</span>
                <div class="h-full bg-admin-primary-normal dark:bg-admin-primary-dark absolute left-0 top-0 z-0"
                    :style="'width:' + progress + '%'">
                </div>
            </div>
        </div>
    </div>
</div>
