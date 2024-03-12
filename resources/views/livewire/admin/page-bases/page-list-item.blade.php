<x-admin.list.table.tr>
    @foreach ($this->getColumns() as $column)
        <x-admin.list.table.td>
            @isset($column['actions'])
                <x-admin.list.actions>
                    @if ($column['actions']['show'])
                        <x-admin.list.actions.show
                            wire:click="show" />
                    @endif

                    @if ($column['actions']['edit'])
                        <x-admin.list.actions.edit
                            wire:click="edit" />
                    @endif

                    @if ($column['actions']['delete'])
                        <x-admin.list.actions.delete
                            wire:click="delete"
                            wire:confirm="{{ __('admin/alerts.confirmation.delete') }}" />
                    @endif
                </x-admin.list.actions>
            @elseif(isset($column['view']))
                @include($column['view'])
            @else
                {{ $this->getColumnContent($column) }}
            @endisset
        </x-admin.list.table.td>
    @endforeach
</x-admin.list.table.tr>
