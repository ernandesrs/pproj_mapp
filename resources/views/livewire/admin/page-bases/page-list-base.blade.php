@php
    $list = $this->getPageList();
@endphp

{{-- filter --}}
<x-admin.list.filter-bar>
    <x-slot name="filters">
        <div class="col-span-3 flex flex-col">
            @php
                $id = uniqid();
            @endphp
            <label for="{{ $id }}">{{ __('admin/worlds.create_date') }}</label>
            <select wire:model="orderBy_created_at" id="{{ $id }}">
                <option value="">None</option>
                <option value="asc">{{ __('admin/worlds.oldest') }}</option>
                <option value="desc">{{ __('admin/worlds.newest') }}</option>
            </select>
        </div>

        @isset($filters)
            {{ $filters }}
        @endisset
    </x-slot>
</x-admin.list.filter-bar>

{{-- list --}}
<x-admin.list.table.table>

    {{-- heads --}}
    <x-slot name="thead">

        <x-admin.list.table.tr>
            @foreach ($this->getTableColumnData() as $column)
                <x-admin.list.table.th>{{ $column['label'] }}</x-admin.list.table.th>
            @endforeach
        </x-admin.list.table.tr>

    </x-slot>

    {{-- body --}}
    <x-slot name="tbody">

        @foreach ($list as $listItem)
            <livewire:admin.page-bases.page-list-item
                :key="$listItem->id"
                :item="$listItem"
                :columns="$this->getTableColumnData($listItem)" />
        @endforeach

    </x-slot>

</x-admin.list.table.table>

<x-admin.list.pagination
    :list="$list" />
