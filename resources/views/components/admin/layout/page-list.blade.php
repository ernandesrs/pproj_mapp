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
    <x-admin.list.filter-bar />

    {{-- content --}}
    {{ $slot }}

    {{-- pagination --}}
    @if ($this->getPageList())
        <x-admin.list.pagination :list="$this->getPageList()" />
    @endif
</x-admin.layout.page>
