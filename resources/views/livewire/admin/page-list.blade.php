<x-admin.layout.page-list
    title="{{ $title ?? null }}"
    :breadcrumbs="$breadcrumbs ?? []"
    :actions="$actions ?? []">

    <x-admin.list.table.table>
        <x-slot name="thead">
            <x-admin.list.table.tr>
                <x-admin.list.table.th></x-admin.list.table.th>
                <x-admin.list.table.th>
                    Name
                </x-admin.list.table.th>
                <x-admin.list.table.th>
                    Username
                </x-admin.list.table.th>
                <x-admin.list.table.th>
                    Email
                </x-admin.list.table.th>
                <x-admin.list.table.th></x-admin.list.table.th>
            </x-admin.list.table.tr>
        </x-slot>

        <x-slot name="tbody">
            @foreach ($list as $listItem)
                <x-admin.list.table.tr>
                    <x-admin.list.table.td>
                        <input type="checkbox" name="" class="w-5 h-5">
                    </x-admin.list.table.td>
                    <x-admin.list.table.td>
                        {{ $listItem->first_name }} {{ $listItem->last_name }}
                    </x-admin.list.table.td>
                    <x-admin.list.table.td>
                        {{ $listItem->username }}
                    </x-admin.list.table.td>
                    <x-admin.list.table.td>
                        {{ $listItem->email }}4
                    </x-admin.list.table.td>
                    <x-admin.list.table.td>
                        <x-admin.list.actions />
                    </x-admin.list.table.td>
                </x-admin.list.table.tr>
            @endforeach
        </x-slot>
    </x-admin.list.table.table>

</x-admin.layout.page-list>