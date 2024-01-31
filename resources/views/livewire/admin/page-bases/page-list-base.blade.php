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
            <x-admin.list.table.tr>
                @foreach ($this->getTableColumnData() as $column)
                    <x-admin.list.table.td>
                        @if (isset($column['callback']))
                            {{ $column['callback']($listItem) }}
                        @elseif(isset($column['actions']) && $column['actions'])
                            <x-admin.list.actions
                                :show="$column['actions']['show'] ?? false"
                                :edit="$column['actions']['edit'] ?? false"
                                :delete="$column['actions']['delete'] ?? false" />
                        @endif
                    </x-admin.list.table.td>
                @endforeach
            </x-admin.list.table.tr>
        @endforeach

    </x-slot>

</x-admin.list.table.table>
