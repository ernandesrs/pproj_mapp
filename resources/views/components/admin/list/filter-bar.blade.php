@if ($this->isSearchable() || $this->isFilterable())
    <div
        class="bg-admin-light-light dark:bg-admin-dark-normal bg-opacity-50 dark:bg-opacity-25 border border-b-0 border-admin-light-dark border-opacity-25 dark:border-admin-dark-dark dark:border-opacity-25 py-4 px-4 rounded-tl rounded-tr">
        <div class="grid grid-cols-12">

            {{-- filters --}}
            @if ($this->isFilterable() && $this->showFilterFields)
                <div
                    wire:transision
                    class="col-span-12 border dark:bg-admin-dark-light dark:border-admin-dark-normal dark:border-opacity-75 p-3 mb-2">
                    <span
                        class="inline-block font-medium text-admin-font-light-muted dark:text-admin-font-dark-dark">{{ __('admin/worlds.filter') }}</span>
                    <div class="py-3 grid grid-cols-12">
                        @isset($filters)
                            {{ $filters }}
                        @else
                            Empty
                        @endisset
                    </div>
                </div>
            @endif

            <div
                class="col-span-12 flex items-center w-full rounded border border-admin-light-dark dark:border-admin-dark-normal border-opacity-25 dark:border-opacity-75 overflow-hidden">
                {{-- search --}}
                @if ($this->isSearchable())
                    <input
                        wire:model="search"
                        type="search"
                        class="h-full px-6 py-2 outline-none w-full bg-transparent dark:bg-admin-dark-light">
                @endif
                <button
                    wire:click="filter"
                    class="bg-admin-light-normal dark:bg-admin-dark-normal dark:opacity-75 h-full px-5 py-2 flex items-center">
                    <x-admin.icon name="search" /> <span class="ml-4">{{ __('admin/worlds.filter') }}</span>
                </button>

                @if ($this->isFilterable())
                    <button
                        wire:click="filterFieldsToggle"
                        class="bg-admin-light-normal dark:bg-admin-dark-normal dark:opacity-75 h-full px-5 py-2 flex items-center border-l border-admin-light-dark border-opacity-25 dark:border-admin-dark-dark dark:border-opacity-40">
                        @if ($this->showFilterFields)
                            <x-admin.icon
                                wire:transision
                                name="x-lg" />
                        @endif

                        @if (!$this->showFilterFields)
                            <x-admin.icon
                                wire:transision
                                name="funnel-fill" />
                        @endif
                    </button>
                @endif
            </div>

        </div>
    </div>
@endif
