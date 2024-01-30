@props([
    'title' => $title ?? $this->getPageTitle(),
    'breadcrumbs' => $breadcrumbs ?? $this->getPageBreadcrumbs(),
    'actions' => $actions ?? $this->getPageActions(),

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
                <label for="{{ $id }}">{{ __('admin/worlds.create_date') }}</label>
                <select wire:model="orderBy_created_at" id="{{ $id }}">
                    <option value="asc">{{ __('admin/worlds.oldest') }}</option>
                    <option value="desc">{{ __('admin/worlds.newest') }}</option>
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
