@props([
    'list' => null,
])

@if ($list)
    <div
        class="bg-admin-light-light dark:bg-admin-dark-normal bg-opacity-50 dark:bg-opacity-25 border border-t-0 border-admin-light-dark border-opacity-25 dark:border-admin-dark-dark dark:border-opacity-25 py-4 px-4 rounded-bl rounded-br">
        {{ $list->onEachSide(1)->links() }}
    </div>
@endif
