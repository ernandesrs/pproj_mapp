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

        @foreach ($this->getPageList() as $listItem)
            <livewire:admin.page-bases.page-list-item
                :key="$listItem->id"
                :item="$listItem"
                :columns="$this->getTableColumnData()" />
        @endforeach

    </x-slot>

</x-admin.list.table.table>
