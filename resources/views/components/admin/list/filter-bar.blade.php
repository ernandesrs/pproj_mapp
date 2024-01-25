<div
    x-data="{
        ...{{ json_encode([
            'showFilter' => \Request::get('filter', false),
        ]) }},
    }"

    class="bg-admin-light-light dark:bg-admin-dark-normal bg-opacity-50 dark:bg-opacity-25 border border-b-0 border-admin-light-dark border-opacity-25 dark:border-admin-dark-dark dark:border-opacity-25 py-4 px-4 rounded-tl rounded-tr">
    <div class="grid grid-cols-12">

        {{-- filters --}}
        <div
            x-show="showFilter"
            class="col-span-12 border dark:bg-admin-dark-light dark:border-admin-dark-normal dark:border-opacity-75 p-3 mb-2">
            <span
                class="inline-block font-medium text-admin-font-light-muted dark:text-admin-font-dark-dark">{{ __('admin/worlds.filter') }}</span>
            <div class="py-3">
                Filter fields
            </div>
        </div>

        <div
            class="col-span-12 flex items-center w-full rounded border border-admin-light-dark dark:border-admin-dark-normal border-opacity-25 dark:border-opacity-75 overflow-hidden">
            {{-- search --}}
            <input
                type="search"
                class="h-full px-6 py-2 outline-none w-full bg-transparent dark:bg-admin-dark-light">
            <button
                class="bg-admin-light-normal dark:bg-admin-dark-normal dark:opacity-75 h-full px-5 py-2 flex items-center">
                <x-admin.icon name="search" /> <span class="ml-4">{{ __('admin/worlds.filter') }}</span>
            </button>

            <button
                x-on:click="showFilter = !showFilter"
                class="bg-admin-light-normal dark:bg-admin-dark-normal dark:opacity-75 h-full px-5 py-2 flex items-center border-l border-admin-light-dark border-opacity-25 dark:border-admin-dark-dark dark:border-opacity-40">
                <x-admin.icon x-show="showFilter" name="x-lg" />
                <x-admin.icon x-show="!showFilter" name="funnel-fill" />
            </button>
        </div>

    </div>
</div>
