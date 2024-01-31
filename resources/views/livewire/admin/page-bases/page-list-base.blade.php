{{-- list --}}
<x-admin.list.table.table>

    {{-- heads --}}
    <x-slot name="thead">

        <x-admin.list.table.tr>
            @foreach ($this->tableColumnData() as $column)
                <x-admin.list.table.th>{{ $column['label'] }}</x-admin.list.table.th>
            @endforeach
        </x-admin.list.table.tr>

    </x-slot>

    {{-- body --}}
    <x-slot name="tbody">

        @foreach ($this->getPageList() as $listItem)
            <x-admin.list.table.tr>
                @foreach ($this->tableColumnData() as $column)
                    <x-admin.list.table.td>
                        {{ $column['callback']($listItem) }}
                    </x-admin.list.table.td>
                @endforeach
            </x-admin.list.table.tr>
        @endforeach

    </x-slot>

</x-admin.list.table.table>
