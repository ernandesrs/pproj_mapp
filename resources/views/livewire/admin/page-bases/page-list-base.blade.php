@php
    $list = $this->getPageList();
@endphp

{{-- filter --}}
<x-admin.list.filter-bar>
    <x-slot name="filters">
        @foreach ($this->getSortableFields() as $sortableFields)
            @isset($sortableFields['label'])
                <div class="col-span-3 flex flex-col">
                    <x-admin.form.field
                        wire:model="{{ $sortableFields['model'] ?? '' }}"
                        type="select"
                        label="{{ $sortableFields['label'] }}"
                        :options="$sortableFields['options'] ?? []" />
                </div>
            @endisset
        @endforeach

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
