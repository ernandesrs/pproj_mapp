<x-admin.layout.page title="{{ $title }}" :breadcrumbs="$breadcrumbs" :actions="$actions" uncontained>
    {{-- content --}}
    {{ $slot }}
</x-admin.layout.page>
