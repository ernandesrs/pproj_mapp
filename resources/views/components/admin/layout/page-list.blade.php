<x-admin.layout.page title="{{ $title }}" :breadcrumbs="$breadcrumbs" :actions="$actions" uncontained>
    {{-- header --}}
    <div
        class="bg-admin-light-light dark:bg-admin-dark-normal bg-opacity-50 dark:bg-opacity-25 border border-b-0 border-admin-light-dark border-opacity-25 dark:border-admin-dark-dark dark:border-opacity-25 py-4 px-4 rounded-tl rounded-tr">
        <div class="grid grid-cols-12">
            <div
                class="col-span-12 flex items-center w-full rounded border border-admin-light-dark dark:border-admin-dark-normal border-opacity-25 dark:border-opacity-75 overflow-hidden">
                <input
                    type="search"
                    class="h-full px-6 py-3 outline-none w-full bg-transparent dark:bg-admin-dark-light">
                <button class="bg-admin-light-normal dark:bg-admin-dark-normal dark:opacity-75 h-full px-5 py-3 flex items-center">
                    <x-admin.icon name="search" /> <span class="ml-4">Search</span>
                </button>
            </div>
        </div>
    </div>

    {{-- content --}}
    {{ $slot }}
</x-admin.layout.page>
