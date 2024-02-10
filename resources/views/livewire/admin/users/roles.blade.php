@php
    $limitToShow = 2;
    $count = $model->roles()->count();
    $roles = $model->roles()->get();
@endphp

<div class="flex flex-wrap gap-1">
    @foreach ($roles->slice(0, $limitToShow) as $role)
        <x-admin.badge color="success">
            {{ $role->name }}
        </x-admin.badge>
    @endforeach
    @if ($count - $limitToShow > 0)
        <x-admin.badge color="dark">
            +{{ $count - $limitToShow }}
        </x-admin.badge>
    @endif
</div>
