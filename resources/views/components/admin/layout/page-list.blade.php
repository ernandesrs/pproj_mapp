@props([
    'title' => $title ?? $this->setPageTitle(),
    'breadcrumbs' => $breadcrumbs ?? $this->setPageBreadcrumbs(),
    'actions' => $actions ?? $this->setPageActions(),

    // list to get pagination
    'list' => null,
])

<x-admin.layout.page
    title="{{ $title }}"
    :breadcrumbs="$breadcrumbs"
    :actions="$actions"
    uncontained>
    {{-- header --}}
    <x-admin.list.filter-bar>
        <x-slot name="filters">
            <div class="col-span-3 flex flex-col">
                @php
                    $id = uniqid();
                @endphp
                <label for="{{ $id }}">{{ __('admin/words.create_date') }}</label>
                <select wire:model="orderBy_created_at" id="{{ $id }}">
                    <option value="asc">{{ __('admin/words.oldest') }}</option>
                    <option value="desc">{{ __('admin/words.newest') }}</option>
                </select>
            </div>

            @isset($filters)
                {{ $filters }}
            @endisset
        </x-slot>
    </x-admin.list.filter-bar>

    {{-- content --}}
    {{ $slot }}

    {{-- pagination --}}
    @if ($this->getPageList())
        <x-admin.list.pagination :list="$this->getPageList()" />
    @endif
</x-admin.layout.page>
