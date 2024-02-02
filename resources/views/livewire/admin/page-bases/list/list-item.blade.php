<x-admin.list.table.tr>
    @foreach ($this->getColumns() as $column)
        <x-admin.list.table.td>
            @isset($column['actions'])
                <x-admin.list.actions>
                    @isset($column['actions']['delete'])
                        <x-admin.list.actions.delete
                            wire:click="delete"
                            wire:confirm="Confirm deletion" />
                    @endisset
                </x-admin.list.actions>
            @else
                {{ $this->getColumnContent($column) }}
            @endisset
        </x-admin.list.table.td>
    @endforeach
</x-admin.list.table.tr>
